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

        include '../templates/FirstScreen.php';
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


            //move api start

//            $i=0;
//            $_SESSION['fighter']= [];
//            foreach ($stats as $stat):
//                $nameFighterOne=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[2]))[0][0];
//                $nameFighterTwo=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[3]))[0][0];
//                $nameFighterWin=mysqli_fetch_all($this->databaseHandler->searchFighterStats($stat[5]))[0][0];
//                array_push($_SESSION['fighter'],[0 =>$stat[2],1 =>$stat[3]]);
//
//
//                @$searchElement = explode(" ",$nameFighterOne)[1]."-".explode(" ",$nameFighterTwo)[1];
//                $result = file_get_contents('https://gnews.io/api/v3/search?q='.$searchElement.'&token=d5f1a0058a3f693557a503d7f32a5da7');
//
//                $headlines = json_decode($result,true);
//
//                $i++;
//            endforeach;
            //move api end


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



            //youtube api start

            $keyword = $searchQuery;

            //DENAS get an api key please dont use mine

            $apikey = 'AIzaSyCzQYD7xhrEldov3qDtmOtZ5Fpwgh75NFg';
            $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . 15 . '&key=' . $apikey;

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);

            curl_close($ch);
            $data = json_decode($response);
            $value = json_decode(json_encode($data), true);

            if($value){
                $error = false;
            }else{
                $error =  true;
            }
            //youtube api end


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

        if($this->databaseHandler->searchTopicByTitle($topic)){
            //$errorMessage = 'the topic already exists';
            header("Location: http://localhost:8000/index.php?action=forumTopicDiscussion&topicTitle=$topic");
        }else {
            $forumTopic = new ForumTopic();
            $forumTopic->setName($topic);
            $this->databaseHandler->insertObjectIntoTable($forumTopic, 'forumTopic');
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }


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
            $dateAndTime = date("d.m.Y") . " at " . date("h.i") . ":";
            $commentQuery = mysqli_fetch_all($this->databaseHandler->searchForumComments($topicId));

            if ($commentQuery) {
                $commentResults = $commentQuery;
            } else
                $commentResults = [0 => ['', '', 'no comments for this topic']];

            $mockComment = new ForumComment();
            $mockComment->setTopicId($topicId);
            $mockComment->setUserName($nickName);
            $mockComment->setContent($commentContent);
            $mockComment->setDateAndTime(date("d.m.Y") . " at " . date("h.i" . ":"));

            //$this->databaseHandler->insertObjectIntoTable($comment,'comment');

            //$this->databaseHandler->storeComment($topicId, $nickName, $commentContent, $dateAndTime);
            $this->databaseHandler->insertObjectIntoTable($mockComment, 'comment');
            header("Location: {$_SERVER['HTTP_REFERER']}");


        }
    }
}

