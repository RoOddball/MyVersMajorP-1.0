<?php
require_once 'MainController.php';

class WebApp
{
public function run()
{
    $action = filter_input(INPUT_GET, 'action');
    if(empty($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    $mainController = new MainController();

    switch ($action) {


        case 'register':
            require_once __DIR__ . '/../templates/RegisterScreen.php';
            break;

        case 'login':
            require_once __DIR__ . '/../templates/LoginScreen.html';
            break;

        case 'processLogin':
            $mainController->processLogin();
            break;

        case 'processRegister':
            $mainController->processRegister();
            break;

        case 'about':
            $mainController->about();
            break;

        case 'contact':
            $mainController->contact();
            break;

        case 'logout':
            $mainController->Logout();
            break;

        case 'homeSearch':
            $mainController->searchHome();
            break;
        case 'home':
            $mainController->homeBack();
            break;
        case 'fighterStats':
            $mainController->fighterStats();
            break;

        default:
            session_destroy();
            require_once __DIR__ . '/../templates/FirstScreen.php';
    }
}
}