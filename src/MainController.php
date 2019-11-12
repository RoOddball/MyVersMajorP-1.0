<?php
include 'User.php';
require_once  'DatabaseHandler.php';
require_once  'SessionManager.php';

class MainController
{

    private $user;
    private $databaseHandler;
    private $session;

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
       // Session_destroy();
        $_SESSION =[];
        include '../templates/LogoutScreen.php';
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
           require_once __DIR__ . '/../templates/nav.php';
           require_once __DIR__ . '/../templates/HomePage.php';

           $querry = filter_input(INPUT_POST, 'homeSearchLabel');
           $stats[] = $this->databaseHandler->searchForHomeBar($querry);

           $fields =
               [0 => "Fighter id:",
                   1 => "Name:",
                   2 => "Weight class:",
                   3 => "Height:",
                   4 => "Pay pre view rank:",
                   5 => "Country:",
                   6 => "Wins:",
                   7 => "Losses:",
                   8 => "Draws:"
               ];

           require_once __DIR__ . '/../templates/homeSearchResults.php';
       }
    }
}