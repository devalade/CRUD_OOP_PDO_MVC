<?php

require_once "config/db.php";

class BibliothequeController extends Db {

  public function getBibliotheque() {
    $sql = "SELECT * FROM `bibliotheque` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addBibliotheque($num_mus, $ISBN, $date_achat) {
    $sql = "INSERT INTO `bibliotheque` VALUES(:numMus,:ISBN,:dateAchat)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":numMus" => $num_mus, ":ISBN" => $ISBN, ":dateAchat" => $date_achat]);
  }

  public function updateBibliotheque($num_mus, $ISBN, $date_achat, $musee, $ouvrage) {
    $sql = "UPDATE `bibliotheque` set  numMus = :numMus, ISBN = :ISBN, dateAchat = :dateAchat WHERE numMus = :mus and ISBN = :ouv";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":numMus" => $num_mus,
							":ISBN" => $ISBN,
							":dateAchat"=> $date_achat,
							":mus" => $musee,
							":ouv" => $ouvrage
							]);
  }

  public function delBibliotheque($num_mus, $ISBN) {
    $sql = "DELETE FROM `bibliotheque` WHERE numMus = :numMus and ISBN= :ISBN ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":numMus" => $num_mus,":ISBN" => $ISBN]);
  }
}