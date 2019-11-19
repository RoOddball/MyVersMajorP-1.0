<?php
include 'User.php';
require_once  'DatabaseHandler.php';
require_once  'SessionManager.php';

class MainController
{

    private $user;
    private $databaseHandler;
    private $session;
    private $fighterNames;

   public function __construct(){
        $this->user= new User();
        $this->databaseHandler = new DatabaseHandler();
        $this->session = new SessionManager();
   }

    public function processLogin(){

        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        //$name= ;
        @$fetch[]=mysqli_fetch_array(MainController::existsUser($username));

       if($username==$fetch[0][1] && $password==$fetch[0][2]){

           $this->session->isLoggedIn();
           $this->session->storeUsername($username);
           @$this->session->storeIsAdmin(mysqli_fetch_array($fetch)[0][3]);
           include '../templates/nav.php';
           include '../templates/HomePage.php';
    
           // messin
//           require_once __DIR__.'/Event.php';
//            $event = new Event();
//            $event->setEventName('TestEvent');
//            $event->setFighterBlue(5);
//            $event->setEventDate('2019-03-03');
//            $event->setFighterRed(6);
//            $event->setVenue('whatever');
//            $event->setResult(5);
//            $event->setWay('RNC');
//            $this->databaseHandler->insertObjectIntoTable($event,'event');

           //messin

       }else{

           $message = 'Sorry but your credentials are not found';
           include '../templates/error.php';
       }
    }

    public function processRegister(){



        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $address = filter_input(INPUT_POST, 'address');

        $name= MainController::existsUser($username);

        if(!$name) {

            $this->session->isLoggedIn();
            $this->databaseHandler->insertUser($username, $password,$address);
            $this->session->storeUsername($username);
            @$this->session->storeIsAdmin(mysqli_fetch_array($name)[2]);
            include '../templates/nav.php';
            require_once __DIR__ . '/../templates/HomePage.php';
          

        }else{

            $message = "Sorry $username the credentials are already in use ";
            include '../templates/error.php';
        }

    }

    function existsUser($username)
    {

        $users = $this->databaseHandler->searchUser($username);

        if (mysqli_num_rows($users[0])>0) {
            return $users[0];
        }

        return null;
    }

    public function Logout()
    {
        //$_SESSION =[];
        include '../templates/LogoutScreen.php';
        $_SESSION=[];
    }
    public function about(){

       require_once __DIR__.'/../templates/about.html';
       require_once __DIR__.'/../templates/nav.php';
    }
    public function contact(){

       require_once __DIR__.'/../templates/contact.html';
       require_once __DIR__.'/../templates/nav.php';
    }

    public function home(){

       if($this->session->isLoggedIn()){

           include '../templates/nav.php';
           require_once __DIR__.'/../templates/HomePage.php';

       }
    }

    public function searchHome(){

       if($this->session->isLoggedIn()) {


           $query = filter_input(INPUT_POST, 'homeSearchLabel');

          // $stats[] = $this->databaseHandler->searchForHomeBar($querry);

           $stats = mysqli_fetch_all($this->databaseHandler->searchForEvent($query));

           require_once __DIR__ . '/../templates/homeSearchResults.php';
       }
    }

    public function homeBack(){

       if($this->session->isLoggedIn()){

          // include '../templates/nav.php';
           require_once __DIR__.'/../templates/HomePage.php';
       }
    }

    public function fighterStats(){

       if($this->session->isLoggedIn()) {

           $query= $_SESSION['fighter'][$_GET["i"]];
           var_dump(intval($query[0]));

           $fighterRedStats = mysqli_fetch_all($this->databaseHandler->searchFighterStats(intval($query[0])))[0];
           $fighterBlueStats= mysqli_fetch_all($this->databaseHandler->searchFighterStats(intval($query[1])))[0];

           require_once __DIR__.'/../templates/testPage.php';

       }
    }
}

