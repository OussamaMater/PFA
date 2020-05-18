<?php
session_start();

// Redirect function
    function redirect($page)
    {
        if (!headers_sent()) {
            header('location: ' . URLROOT . $page);
            exit;
        }
    }
// Test if the user is logged in
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
