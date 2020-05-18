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
            PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        );
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            print_r($this->error);
        }
    }

    // Prepare statement with query
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    // Bind values
    public function bind($param, $value, $type = null)
    {
        if ($type===null) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case $value===null:
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    // Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }
    // Get result set as array of objects
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }
    // Get result set as associative array
    public function resultSetAssoc()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get a signle row
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch();
    }
    // Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
