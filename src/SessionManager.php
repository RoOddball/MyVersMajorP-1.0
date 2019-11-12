<?php


class SessionManager
{
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
}