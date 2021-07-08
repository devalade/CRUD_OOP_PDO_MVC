<?php
    
require_once "config/db.php";

class MuseeController extends Db {

  public function getMusee() {
    $sql = "SELECT * FROM `musee` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addMusee($nom_mus,$nblivres,$code_pays) {
    $sql = "INSERT INTO `musee` (nomMus,nblivres,codePays)  VALUES(:nomMus,:nblivres,:codePays)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":nomMus" => $nom_mus,
							":nblivres"  => $nblivres,
							":codePays" => $code_pays
						]);
  }

  public function updateMusee($id, $nom_mus,$nblivres,$code_pays) {
    $sql = "UPDATE `musee` set  nomMus = :nomMus, codePays = :codePays, nblivres = :nblivres WHERE numMus = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":nomMus" => $nom_mus,
			":codePays" =>$code_pays,
			":nblivres"=> $nblivres,
			":id" => $id
        ]);
  }

  public function delMusee($nom_mus) {
    $sql = "DELETE FROM `musee` WHERE numMus = :numMus";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":numMus" => $nom_mus]);
  }
}