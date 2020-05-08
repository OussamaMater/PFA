<?php
session_start();

// Redirect function
function redirect($page)
{
    header('location: ' . URLROOT . $page);
}
// Test if the user is logged in
function isLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}
