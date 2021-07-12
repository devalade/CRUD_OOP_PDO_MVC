<?php

require_once "../config/db.php";

class ReferencerController extends Db {

  public function getReferencer() {
    $sql = "SELECT * FROM `reference` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addReferencer($nom_site,$ISBN,$numeroPage) {
    $sql = "INSERT INTO `reference` (nomSite,ISBN,numeroPage) VALUES(:nomSite,:ISBN,:numeroPage)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":nomSite" => $nom_site,
							":ISBN"=> $ISBN,
							":numeroPage"=> $numeroPage
						]);
  }

  public function updateReferencer($nom_site,$ISBN, int $numeroPage,$si, $ouv, int $np) {
    $sql = "UPDATE `reference` set  nomSite = :nomSite, ISBN = :ISBN, numeroPage = :numeroPage WHERE nomSite = :si and ISBN = :ouv and numeroPage = :np "; 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":nomSite" => $nom_site,
							":ISBN" => $ISBN,
							":numeroPage"=> $numeroPage,
							":si" => $si,
							":ouv" => $ouv,
							":np" => $np
							]);
  }

  public function delReferencer($nom_site, $ISBN ,$numeroPage) {
    $sql = "DELETE FROM `reference` WHERE nomSite = :nomSite and ISBN= :ISBN and numeroPage = :numeroPage ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":nomSite" => $nom_site,
							":ISBN" => $ISBN,
							":numeroPage" => $numeroPage
						]);
  }
}