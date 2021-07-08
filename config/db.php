<?php

class Db {

  
  private $servername = "localhost:3306";
  private $username = "root";
  private $password = "";
  
  public function connect()
  {
    try {
      $con = new PDO("mysql:host=$this->servername;dbname=musee", $this->username, $this->password);
      // set the PDO error mode to exception
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
      return $con;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

}