<?php

require_once "config/db.php";

class RelierController extends Db {

  public function getRelier() {
    $sql = "SELECT * FROM `ouvrage` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addRelier($ISBN,$titre,$nbPage,$code_pays) {
    $sql = "INSERT INTO `ouvrage` (ISBN,titre,nbPage,codePays)  VALUES(:ISBN,:titre,:nbPage,:codePays)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":ISBN" => $ISBN,
						":titre"=> $titre,
						":nbPage"=> $nbPage,
						":codePays" => $code_pays
					]);
  }

  public function updateRelier($id, $ISBN,$titre,$nbPage,$code_pays) {
    $sql = "UPDATE `ouvrage` set  ISBN = :ISBN,codePays = :codePays,nbPage = :nbPage,titre = :titre WHERE ISBN = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":ISBN" => $ISBN,
							":codePays" => $code_pays,
							":nbPage"=> $nbPage,
							":titre"=> $titre,
							":id" => $id
						]);
  }

  public function delRelier($ISBN) {
    $sql = "DELETE FROM `ouvrage` WHERE ISBN = :ISBN";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":ISBN" => $ISBN]);
  }
}