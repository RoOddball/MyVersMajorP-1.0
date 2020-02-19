<?php


class SessionManager
{
    public function initiateFighter(){
        $_SESSION['fighter']=[];
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }


    }

    public function storeUsername($username)
    {
        $_SESSION['username'] = $username;
    }

    public function storeIsAdmin($isAdmin)
    {
        $_SESSION['isAdmin'] = $isAdmin;
    }

    public function usernameFromSession()
    {
        if (isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else {
            return false;
        }
    }

    public function isAdminFromSession()
    {
        if (isset($_SESSION['username'])) {
            return $_SESSION['isAdmin'];
        } else {
            return false;
        }

    }

    public function setFightersNames($fighterRed,$fighterBlue){

        array_push($_SESSION['fighter'],$fighterRed);
        array_push($_SESSION['fighter'],$fighterBlue);
    }

    public function getFighterNames(){

        return $_SESSION['fighter'];
    }

    public function popFighterStack(){

        array_pop($_SESSION);
    }

    public function setQuery($searchQuery){

        $_SESSION['searchQuery'] = $searchQuery;
    }

    public function getQuery(){

        return $_SESSION['searchQuery'];
    }
}