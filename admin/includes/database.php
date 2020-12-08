<?php

require_once ("new_config.php");
class Database {


    public $connection;

//  A construction to automatically open the database connection
    function __construct(){
        $this->open_db_connection();
    }
//  method to open database connection

    public function open_db_connection(){

//        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME, DB_PORT);

        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS, DB_NAME, DB_PORT);


        if($this->connection->connect_errno){
            die("Database connection failed brutally" . $this->connection->connect_error);
        }
    }

    public function query($sql){
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }

// method to eliminate some of the codes already created

    private function confirm_query($result){
        if(!$result){
            die("Query Failed" . $this->connection->error);
        }
    }

// method to escape restrains; used to clean up data before it goes into the database

    public function escape_string($string){
        return $escape_string = mysqli_real_escape_string($this->connection, $string);

    }

    public function the_insert_id(){
//        return $this->connection->insert_id;
        return mysqli_insert_id($this->connection);
    }

} // End of class Database

$database = new Database();


