<hr>
<header style="background-color:#ACDFF6; color=#5d6163">
<?php
require_once __DIR__.'/../src/SessionManager.php';
$sessionManager = new SessionManager();
$isLoggedin = $sessionManager->isLoggedIn();

if($isLoggedin){
    print 'you are logged in as: ' . $sessionManager->usernameFromSession();
    print '<br><a href="index.php?action=logout">logout</a>';
} else {

    print '<a href="index.php">welcome page</a> <br> <a href="index.php?action=login">login</a>';
}

?>

