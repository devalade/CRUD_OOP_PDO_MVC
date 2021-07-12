<?php
    
require_once "../config/db.php";

class MomentController extends Db {

  public function getMoment() {
    $sql = "SELECT * FROM `moment` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addMoment($jour) {
    $sql = "INSERT INTO `moment` (jour)  VALUES(:jour)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":jour" => $jour]);
  }

  public function updateMoment($jour, $id ) {
    $sql = "UPDATE `moment` set  jour = :jour  WHERE jour = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":jour" => $jour, ":id" => $id]);
  }

  public function delMoment($jour) {
    $sql = "DELETE FROM `moment` WHERE jour = :jour";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":jour" => $jour]);
  }
}