<?php

class Database
{
    /**
     * host
     *
     * @access private
     * @var string
     */
    private $host     = DB_HOST;
    /**
     * database user
     *
     * @var string
     */
    private $user     = DB_USER;
    /**
     * database password
     *
     * @access private
     * @var string
     */
    private $password = DB_PASS;
    /**
     * database name
     *
     * @access private
     * @var string
     */
    private $dbname   = DB_NAME;

    /**
     * dbh
     *
     * @access private
     * @var string
     */
    private $dbh;
    /**
     * stmt
     *
     * @access private
     * @var string
     */
    private $stmt;
    /**
     * error
     *
     * @access private
     * @var mixed
     */
    private $error;
    
    /**
     * __construct
     *
     *
     * @throws Exception
     * @access public
     * @return connection
     */
    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options =  array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh= new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            print_r($this->error);
        }
    }
}
