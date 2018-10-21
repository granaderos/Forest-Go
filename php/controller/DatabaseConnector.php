<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/19/16
 * Time: 1:32 PM
 */

class DatabaseConnector {
    protected $dbHost = "mysql:host=localhost;";
    protected $dbName = "dbname=forestGo";
    protected $user = "root";
    protected $password = "";
    protected $dbHolder;

    function openConnection() {
        $this->dbHolder = new PDO($this->dbHost.$this->dbName, $this->user, $this->password);
    }

    function closeConnection() {
        $this->dbHolder = null;
    }
} 