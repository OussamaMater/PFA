<?php

/**
 * Model
 *
 * Admin Model
 */
class Admin
{
    private $dbm;
    public function __construct()
    {
        $this->dbm = new Database;
    }
    public function adminLogin($username, $password)
    {
        $this->dbm->query('SELECT * FROM admins WHERE username = :username');
        $this->dbm->bind(':username', $username);
        $this->dbm->execute();
        if ($this->dbm->rowCount()>0) {
            $row = $this->dbm->single();
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            }
        }
        return false;
    }
}
