<?php

require_once "config/db.php";

class OuvrageController extends Db {

  public function getOuvrage() {
    $sql = "SELECT * FROM `ouvrage` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addOuvrage($ISBN,$titre,$nbPage,$code_pays) {
    $sql = "INSERT INTO `ouvrage` (ISBN,titre,nbPage,codePays)  VALUES(:ISBN,:titre,:nbPage,:codePays)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":ISBN" => $ISBN,
						":titre"=> $titre,
						":nbPage"=> $nbPage,
						":codePays" => $code_pays
					]);
  }

  public function updateOuvrage($id, $ISBN,$titre,$nbPage,$code_pays) {
    $sql = "UPDATE `ouvrage` set  ISBN = :ISBN,codePays = :codePays,nbPage = :nbPage,titre = :titre WHERE ISBN = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":ISBN" => $ISBN,
							":codePays" => $code_pays,
							":nbPage"=> $nbPage,
							":titre"=> $titre,
							":id" => $id
						]);
  }

  public function delOuvrage($ISBN) {
    $sql = "DELETE FROM `ouvrage` WHERE ISBN = :ISBN";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":ISBN" => $ISBN]);
  }
}