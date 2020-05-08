<?php

/**
 * Controller
 *
 * Pages Controller
 */
class Pages extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->view('pages/index');
    }
    public function about()
    {
        $this->view('pages/about');
    }
}
