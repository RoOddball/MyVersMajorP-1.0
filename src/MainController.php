<?php
include 'User.php';
require_once  'DatabaseHandler.php';
require_once  'SessionManager.php';
require_once  'PingPongBall.php';
require_once  'ForumTopic.php';
require_once  'ForumComment.php';

class MainController
{

    private $user;
    private $databaseHandler;
    private $session;
    private $fighterNames;

    public function __construct()
    {
        $this->user = new User();
        $this->databaseHandler = new DatabaseHandler();
        $this->session = new SessionManager();
    }

    public function processLogin()
    {


        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        //$name= ;
        @$fetch[] = mysqli_fetch_array(MainController::existsUser($username));

        if ($username == $fetch[0][1] && $password == $fetch[0][2]) {

            $this->session->isLoggedIn();
            $this->session->storeUsername($username);
            @$this->session->storeIsAdmin(mysqli_fetch_array($fetch)[0][3]);
            $nickName = $this->session->usernameFromSession();
            //include '../templates/nav.php';
            include '../templates/HomePage.php';

            // messin
            require_once __DIR__ . '/Event.php';
//            $event = new Event();
//            $event->setEventName('TestEvent2');
//            $event->setFighterBlue(5);
//            $event->setEventDate('2019-03-04');
//            $event->setFighterRed(6);
//            $event->setVenue('whatever');
//            $event->setResult(7);
//            $event->setWay('RNC');
//            $this->databaseHandler->insertObjectIntoTable($event,'event');

            //messin

        } else {

            $message = 'Sorry but your credentials are not found';
            include '../templates/error.php';
        }
    }

    public function processRegister()
    {


        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $address = filter_input(INPUT_POST, 'address');

        $name = MainController::existsUser($username);


        if (!$name) {


            $this->session->isLoggedIn();
            $this->databaseHandler->insertUser($username, $password, $address);
            $this->session->storeUsername($username);
            @$this->session->storeIsAdmin(mysqli_fetch_array($name)[2]);
            //include '../templates/nav.php';
            //require_once __DIR__ . '/../templates/HomePage.php';
            $this->firstScreen();


        } else {

            $message = "Sorry $username the credentials are already in use ";
            include '../templates/error.php';
        }

    }

    function existsUser($username)
    {

        $users = $this->databaseHandler->searchUser($username);

        if (mysqli_num_rows($users[0]) > 0) {
            return $users[0];
        }

        return null;
    }

    public function Logout()
    {

        include '../templates/LogoutScreen.php';
        $_SESSION = [];
    }

    public function about()
    {

        require_once __DIR__ . '/../templates/about.html';
        require_once __DIR__ . '/../templates/nav.php';
    }

    public function contact()
    {

        require_once __DIR__ . '/../templates/contact.html';
        require_once __DIR__ . '/../templates/nav.php';
    }

    public function home()
    {

        if ($this->session->isLoggedIn()) {

            //include '../templates/nav.php';
            require_once __DIR__ . '/../templates/HomePage.php';

        }
    }

    public function searchHome()
    {

        $nickName = $this->session->usernameFromSession();

        if ($this->session->isLoggedIn()) {

            $query = filter_input(INPUT_POST, 'homeSearchLabel');

            $this->session->setQuery($query);

            $stats = mysqli_fetch_all($this->databaseHandler->searchForEvent($query));

            require_once __DIR__ . '/../templates/homeSearchResults.php';
        }
    }

    public function homeBack()
    {

        $nickName = $this->session->usernameFromSession();

        if ($this->session->isLoggedIn()) {

            require_once __DIR__ . '/../templates/HomePage.php';
        }
    }

    public function fighterStats()
    {

        $nickName = $this->session->usernameFromSession();

        if ($this->session->isLoggedIn()) {

            $searchQuery = str_replace(" ", "%20", $this->session->getQuery());
            $query = $_SESSION['fighter'][$_GET["i"]];

            $fighterRedStats = mysqli_fetch_all($this->databaseHandler->searchFighterStats(intval($query[0])))[0];
            $fighterBlueStats = mysqli_fetch_all($this->databaseHandler->searchFighterStats(intval($query[1])))[0];

            require_once __DIR__ . '/../templates/FightersCompare.php';
        }
    }

    public function firstScreen()
    {

        require_once __DIR__ . '/../templates/FirstScreen.php';
        $this->session = [];

    }

    public function forum()
    {

        $nickName = $this->session->usernameFromSession();

        $topicResults = mysqli_fetch_all($this->databaseHandler->searchForumTopics());

        if ($this->session->isLoggedIn())
            require_once __DIR__ . '/../templates/ForumTopics.php';

    }

    public function commitForumTopic()
    {


        $nickName = $this->session->usernameFromSession();

        $topic = filter_input(INPUT_POST, 'forumTopic');
        $forumTopic = new ForumTopic();
        $forumTopic->setName($topic);
        $this->databaseHandler->insertObjectIntoTable($forumTopic, 'forumTopic');

        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
    public function forumTopicDiscussion(){

        $nickName = $this->session->usernameFromSession();

        if(isset($_GET['topicTitle'])) {
            $topicTitle = $_GET['topicTitle'];
        }

        $topicId = intval($this->databaseHandler->searchTopicByTitle($topicTitle));
        $this->session->storeForumTopicId($topicId);
        $this->session->storeForumTopicTitle($topicTitle);
        $commentResults = mysqli_fetch_all($this->databaseHandler->searchForumComments($topicId));

        if($this->session->isLoggedIn()) {
            require_once __DIR__ . '/../templates/ForumTopicDiscussion.php';
            //var_dump($commentResults);
        }
    }

    public function commitComment(){

        $nickName = $this->session->usernameFromSession();

        if($this->session->isLoggedIn()) {

            //require_once __DIR__ . '/../templates/ForumTopicDiscussion.php';
            $topicId = intval($this->session->getTopicIdFromSession());
            $topicTitle = $this->session->getTopicTitleFromSession();
            $commentContent = filter_input(INPUT_POST, 'forumComment');
            $commentQuery= mysqli_fetch_all($this->databaseHandler->searchForumComments($topicId));

            if($commentQuery){
                $commentResults = $commentQuery;
            }else
                $commentResults =[0=>['','','no comments for this topic']];

//            $comment = new ForumComment();
//            $comment->setTopicId($topicId);
//            $comment->setUserName($nickName);
//            $comment->setContent($commentContent);
//
//            $this->databaseHandler->insertObjectIntoTable($comment,'comment');

            $this->databaseHandler->storeComment($topicId,$nickName,$commentContent);
            header("Location: {$_SERVER['HTTP_REFERER']}");

        }
    }
}

