<?php
    
require_once "../config/db.php";

class VisiterController extends Db {

  public function getVisiter() {
    $sql = "SELECT * FROM `visiter` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addVisiter($num_mus,$jour,$nbvisiteurs) {
    $sql = "INSERT INTO `visiter` VALUES(:numMus,:jour,:nbvisiteurs)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":numMus" => $num_mus,
							":jour"=> $jour,
							":nbvisiteurs"=> $nbvisiteurs
						]);
  }

  public function updateVisiter($num_mus,$jour,$nbvisiteurs, $mus, $ment) {
    $sql = "UPDATE `visiter` set  numMus = :numMus, jour = :jour, nbvisiteurs = :nbvisiteurs WHERE numMus = :mus and jour = :ment";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":numMus" => $num_mus,
							":jour" => $jour,
							":nbvisiteurs"=> $nbvisiteurs,
							":mus" => $mus,
							":ment" => $ment
							]);
  }

  public function delVisiter($num_mus, $jour) {
    $sql = "DELETE FROM `visiter` WHERE numMus = :numMus and jour= :jour ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":numMus" => $num_mus,":jour" => $jour]);
  }
}