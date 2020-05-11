<?php

/**
 * Model
 *
 * User Model
 */
class User
{
    private $dbm;
    public function __construct()
    {
        $this->dbm = new Database;
    }
    // SignUp function
    public function signup($data)
    {
        $this->dbm->query("INSERT INTO users (idUser, userFName, userLName, userEmail, userAddress, userPassword, userPhone) VALUES (:userID, :firstname, :lastname, :email, :useraddress, :userpassword, :userphone)");
        $this->dbm->bind(':userID', rand(1, 1000));
        $this->dbm->bind(':firstname', $data['firstname']);
        $this->dbm->bind(':lastname', $data['lastname']);
        $this->dbm->bind(':email', $data['email']);
        $this->dbm->bind(':useraddress', $data['address']);
        $this->dbm->bind(':userpassword', $data['password']);
        $this->dbm->bind(':userphone', $data['phone']);
        if ($this->dbm->execute()) {
            return true;
        }
        return false;
    }
    // Login user
    public function login($email, $password)
    {
        $this->dbm->query('SELECT * FROM users WHERE userEmail = :email');
        $this->dbm->bind(':email', $email);
        $row = $this->dbm->single();
        $hashed_password = $row->userPassword;
        if (password_verify($password, $hashed_password)) {
            return $row;
        }
        return false;
    }
    // Update user's profile
    public function updateProfile($data)
    {
        $this->dbm->query('UPDATE users SET userFName=:firstname, userLNAME=:lastname, userEmail=:email, userAddress=:useraddress, userPassword=:userpassword, userPhone=:userphone WHERE idUser=:userID');
        $this->dbm->bind(':userID', $_SESSION['user_id']);
        $this->dbm->bind(':firstname', $data['firstname']);
        $this->dbm->bind(':lastname', $data['lastname']);
        $this->dbm->bind(':email', $data['email']);
        $this->dbm->bind(':useraddress', $data['address']);
        $this->dbm->bind(':userpassword', $data['password']);
        $this->dbm->bind(':userphone', $data['phone']);
        if ($this->dbm->execute()) {
            $_SESSION['user_email']=$data['email'];
            return true;
        }
        return false;
    }
    // Deletes user's profile
    public function deleteAccount()
    {
        $this->dbm->query('DELETE FROM users WHERE idUser=:userId');
        $this->dbm->bind(':userId', $_SESSION['user_id']);
        if ($this->dbm->execute()) {
            return true;
        }
        return false;
    }
    // Find user by email
    public function findUserByEmail($email)
    {
        $this->dbm->query('SELECT * FROM users WHERE userEmail = :email');
        $this->dbm->bind(':email', $email);
        $this->dbm->single();
        // Check row
        if ($this->dbm->rowCount() > 0) {
            return true;
        }
        return false;
    }
    // Find user by phone in case needed
    public function findUserByPhone($phone)
    {
        $this->dbm->query('SELECT * FROM users WHERE userPhone = :userphone');
        $this->dbm->bind(':email', $phone);
        $this->dbm->single();
        // Check row
        if ($this->dbm->rowCount() > 0) {
            return true;
        }
        return false;
    }
    // Return a user row
    public function returnUser($email)
    {
        $this->dbm->query('SELECT * FROM users WHERE userEmail = :email');
        $this->dbm->bind(':email', $email);
        $row = $this->dbm->single();
        return $row;
    }
}
