<?php

// namespace App;

require_once "../config/db.php";

// use Database;

class PaysController extends Db {

  public function getPays() {
    $sql = "SELECT * FROM `pays` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addPays($code_pays, $nbhabitant) {
    $sql = "INSERT INTO `pays` (codePays,nbhabitant)  VALUES(:codePays,:nbhabitant)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":codePays" => $code_pays,":nbhabitant"=> $nbhabitant]);
  }

  public function updatePays($id, $code_pays, $nbhabitant) {
    $sql = "UPDATE `pays` set  codePays = :codePays, nbhabitant = :nbhabitant WHERE codePays = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":codePays" => $code_pays,
							":nbhabitant"=> $nbhabitant,
								":id" => $id
							]);
  }

  public function delPays($code_pays) {
    $sql = "DELETE FROM `pays` WHERE codePays = :codePays";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":codePays" => $code_pays]);
  }
}