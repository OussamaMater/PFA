<?php
session_start();

    // Redirects users to a given page
    function redirect($page)
    {
        if (!headers_sent()) {
            header('location: ' . URLROOT . $page);
            exit;
        }
    }
    // Tests if the user is logged in
    function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }
    // Custom flash message
    function flash($name, $message, $class='')
    {
        $_SESSION[$name]=$message;
        $_SESSION['class']=$class;
    }
