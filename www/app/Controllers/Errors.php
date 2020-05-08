<?php

/**
 * Controller
 *
 * Error Controller
 */
class Errors extends Controller
{
    public function __construct()
    {
    }
    // Loads 404 error page
    public function notfound()
    {
        $this->view('errors/notfound');
    }
    public function forbidden()
    {
        $this->view('pages/forbidden');
    }
}
