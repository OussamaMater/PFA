<?php

/**
 * Controller
 *
 * Users Controller
 */
class Users extends Controller
{
    private $db;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function index()
    {
        redirect('errors/notfound');
    }
    public function profile()
    {
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'delete') {
                if ($this->userModel->deleteAccount()) {
                    redirect('users/logout');
                }
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                // Santize POST data
                // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // Initializing data
                $data=[
                'firstname'        => trim($_POST['firstname']),
                'lastname'         => trim($_POST['lastname']),
                'address'          => trim($_POST['address']),
                'phone'            => trim($_POST['phone']),
                'email'            => trim($_POST['email']),
                'password'         => trim($_POST['password']),
                'confpassword'     => trim($_POST['confpassword']),
                'firstname_err'    => '',
                'lastname_err'     => '',
                'address_err'      => '',
                'phone_err'        => '',
                'email_err'        => '',
                'password_err'     => '',
                'confpassword_err' => ''
            ];
                if (empty($data['firstname'])) {
                    $data['firstname_err'] = "Please enter your first name";
                }
                if (empty($data['lastname'])) {
                    $data['lastname_err'] = "Please enter your last name";
                }
                if (empty($data['address'])) {
                    $data['address_err'] = "Please enter your address";
                }
                if (empty($data['phone'])) {
                    $data['phone_err'] = "Please enter your phone number";
                }
                if (empty($data['email'])) {
                    $data['email_err'] = "Please enter your email";
                }
                if (empty($data['password'])) {
                    $data['password_err'] = "Please enter your password";
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = "Password must be at least 6 characters";
                }
                if (empty($data['confpassword'])) {
                    $data['confpassword_err'] = "Please confirm password";
                } elseif ($data['password'] != $data['confpassword']) {
                    $data['confpassword_err'] = "passwords do not match";
                }
                if (empty($data['email_err']) && empty($data['password_err']) && empty($data['confpassword_err']) && empty($data['phone_err']) && empty($data['address_err']) && empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['username_err'])) {
                    // Validated
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if ($this->userModel->updateProfile($data)) {
                        flash('update_profile', 'Your profile was successfully updated!');
                        redirect('users/profile', $data);
                    } else {
                        print_r("Something went wrong");
                    }
                } else {
                    $this->view('users/profile', $data);
                }
            }
            $row = $this->userModel->returnUser($_SESSION['user_email']);
            $data=[
                'firstname'        => $row->userFName,
                'lastname'         => $row->userLName,
                'address'          => $row->userAddress,
                'phone'            => $row->userPhone,
                'email'            => $row->userEmail,
                'password'         => $_COOKIE['user_password'],
                'confpassword'     => $_COOKIE['user_password'],
                'firstname_err'    => '',
                'lastname_err'     => '',
                'address_err'      => '',
                'phone_err'        => '',
                'email_err'        => '',
                'password_err'     => '',
                'confpassword_err' => ''
            ];
            $this->view('users/profile', $data);
        }
        redirect('users/login');
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Santize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Initializing data
            $data = [
                'email'        => trim($_POST['email']),
                'password'     => $_POST['password'],
                'email_err'    => '',
                'password_err' => '',
            ];
            // Validating data
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter your email";
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter your first name";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be at least 6 characters";
            }
            if ($this->userModel->findUserByEmail($data['email'])) {
            } else {
                $data['email_err'] = "No user found";
                $data['password_err'] = " ";
            }
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    // Create Session
                    $this->createCookie($data);
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('users/login', $data);
        }
    }
    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Santize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Initializing data
            $data = [
                'firstname'        => trim($_POST['firstname']),
                'lastname'         => trim($_POST['lastname']),
                'address'          => trim($_POST['address']),
                'phone'            => trim($_POST['phone']),
                'email'            => trim($_POST['email']),
                'password'         => $_POST['password'],
                'confpassword'     => $_POST['confpassword'],
                'firstname_err'    => '',
                'lastname_err'     => '',
                'address_err'      => '',
                'phone_err'        => '',
                'email_err'        => '',
                'password_err'     => '',
                'confpassword_err' => ''
            ];
            // Validating data
            if (empty($data['firstname'])) {
                $data['firstname_err'] = "Please enter your first name";
            }
            if (empty($data['lastname'])) {
                $data['lastname_err'] = "Please enter your last name";
            }
            if (empty($data['address'])) {
                $data['address_err'] = "Please enter your address";
            }
            if (empty($data['phone'])) {
                $data['phone_err'] = "Please enter your phone number";
            }
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter your email";
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = "Email is already taken";
                }
            }
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter your password";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be at least 6 characters";
            }
            if (empty($data['confpassword'])) {
                $data['confpassword_err'] = "Please confirm password";
            } elseif ($data['password'] != $data['confpassword']) {
                $data['confpassword_err'] = "passwords do not match";
            }
            if (empty($data['email_err']) && empty($data['password_err']) && empty($data['confpassword_err']) && empty($data['phone_err']) && empty($data['address_err']) && empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['username_err'])) {
                // Validated
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                if ($this->userModel->signup($data)) {
                    flash('register', 'Register Success');
                    redirect('users/login');
                } else {
                    print_r("Something went wrong");
                }
            } else {
                $this->view('users/signup', $data);
            }
        } else {
            $data = [
                'firstname'        => '',
                'lastname'         => '',
                'address'          => '',
                'phone'            => '',
                'username'         => '',
                'email'            => '',
                'password'         => '',
                'confpassword'     => '',
                'firstname_err'    => '',
                'lastname_err'     => '',
                'address_err'      => '',
                'phone_err'        => '',
                'username_err'     => '',
                'email_err'        => '',
                'password_err'     => '',
                'confpassword_err' => ''
            ];
            $this->view('users/signup', $data);
        }
    }
    // Create session
    public function createUserSession($user)
    {
        $_SESSION['user_id']    = $user->idUser;
        $_SESSION['user_email'] = $user->userEmail;
        $_SESSION['user_fname'] = $user->userFName;
        redirect('users/profile');
    }
    // Create a cookie
    public function createCookie($data)
    {
        setcookie('user_password', $data['password'], time() + (86400 * 30));
    }
    // Unset and destroy session
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_fname']);
        if (isset($_SESSION['update_profile'])) {
            unset($_SESSION['update_profile']);
        }
        if (isset($_SESSION['register'])) {
            unset($_SESSION['register']);
        }
        session_destroy();
        redirect('users/login');
    }
}
