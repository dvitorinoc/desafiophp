<?php

namespace Core;
use \mysqli;

$servername = "localhost";
$username = "root";
$password = "";
$database = "desafiophp";

// Create connection


/**
 * @author Douglas Carvalho Santos
 */
class DBConnection
{

    private  $connection;
    private static $instance;

    /**
     * Default constructor
     */
    private function __construct()
    {
        $this->connect();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    /**
     * 
     */
    public function connect()
    {
        $this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        // Check connection
        if ($this->connection->connect_error) {
          die("Connection failed: " . $this->connection->connect_error);
        }
    }

    /**
     * 
     */
    public function query($query)
    {
        $result = $this->connection->query($query);
        if($result === TRUE || $result === FALSE) {
            return TRUE;
        }
        $data = [];
        for($i = 0; $i < mysqli_num_rows($result); $i++) {
            array_push($data, $result->fetch_assoc());
        }
        return $data;
    }

}
