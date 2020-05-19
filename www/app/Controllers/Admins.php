<?php

/**
 * Controller
 *
 * Admin Controller
 */
class Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }
    // Loads admin form
    public function panel()
    {
        if ($this->adminStatus()) {
            redirect('pages/index');
            return;
        }
        if (filter_has_var(INPUT_SERVER, 'REQUEST_METHOD')) {
            if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data=[
                    'username' => (filter_has_var(INPUT_POST, 'username')) ? filter_input(INPUT_POST, 'username') : '',
                    'password' => (filter_has_var(INPUT_POST, 'password')) ?filter_input(INPUT_POST, 'password') : ''
                ];
                if ($row=$this->adminModel->adminLogin($data['username'], $data['password'])) {
                    if ($this->createAction($row)) {
                        redirect('pages/index');
                    }
                    return;
                }
                $this->view('admins/panel');
                return;
            }
        }
        $this->view('admins/panel');
    }
    // Creates session when successfully signed In
    public function createAction($row)
    {
        if (!Session::exists('admin')) {
            Session::put('admin', $row->id);
            return true;
        }
        return false;
    }
    // Checks if the admin is logged In
    private function adminStatus()
    {
        if (Session::exists('admin')) {
            return true;
        }
    }
    // Unset admin session and destroy it
    public function logout()
    {
        if (Session::delete('admin')) {
            Session::destroy();
            redirect('admins/panel');
        }
    }
    // Loads stats
    public function stats()
    {
        // Checks if loggedIn else redirected to 403 error page
        if ($this->adminStatus()) {
            $this->view('admins/stats');
            return;
        }
        redirect('errors/forbidden');
    }
}
