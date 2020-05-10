<?php

/**
 * Model
 *
 * User Model
 */
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // SignUp function
    public function signup($data)
    {
        $this->db->query("INSERT INTO users (idUser, userFName, userLName, userEmail, userAddress, userPassword, userPhone) VALUES (:userID, :firstname, :lastname, :email, :useraddress, :userpassword, :userphone)");
        $this->db->bind(':userID', rand(1, 1000));
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':useraddress', $data['address']);
        $this->db->bind(':userpassword', $data['password']);
        $this->db->bind(':userphone', $data['phone']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Login user
    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE userEmail = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->userPassword;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    // Update user's profile
    public function updateProfile($data)
    {
        $this->db->query('UPDATE users SET userFName=:firstname, userLNAME=:lastname, userEmail=:email, userAddress=:useraddress, userPassword=:userpassword, userPhone=:userphone WHERE idUser=:userID');
        $this->db->bind(':userID', $_SESSION['user_id']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':useraddress', $data['address']);
        $this->db->bind(':userpassword', $data['password']);
        $this->db->bind(':userphone', $data['phone']);
        if ($this->db->execute()) {
            $_SESSION['user_email']=$data['email'];
            return true;
        } else {
            return false;
        }
    }
    // Deletes user's profile
    public function deleteAccount()
    {
        $this->db->query('DELETE FROM users WHERE idUser=:userId');
        $this->db->bind(':userId', $_SESSION['user_id']);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }
    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE userEmail = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // Find user by phone in case needed
    public function findUserByPhone($phone)
    {
        $this->db->query('SELECT * FROM users WHERE userPhone = :userphone');
        $this->db->bind(':email', $phone);
        $row = $this->db->single();
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // Return a user row
    public function returnUser($email)
    {
        $this->db->query('SELECT * FROM users WHERE userEmail = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $row;
    }
}
