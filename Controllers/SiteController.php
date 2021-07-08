<?php

require_once "config/db.php";

class SiteController extends Db {

  public function getSite() {
    $sql = "SELECT * FROM `site` ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addSite($nom_site,$anneedecouv,$codePays) {
    $sql = "INSERT INTO `site` (nomSite,anneedecouv,codePays)  VALUES(:nomSite,:anneedecouv,:codePays)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":nomSite" => $nom_site,":anneedecouv"=> $anneedecouv,":codePays" => $codePays]);
  }

  public function updateSite($id, $nom_site,$anneedecouv,$codePays) {
    $sql = "UPDATE `site` set  nomSite = :nomSite, codePays = :codePays, anneedecouv = :anneedecouv WHERE nomSite = :id";   
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([
        ":nomSite" => $nom_site,
        ":anneedecouv"=> $anneedecouv,
        ":codePays" => $codePays, 
        ':id' => $id
    ]);
  }

  public function delSite($nom_site) {
    $sql = "DELETE FROM `site` WHERE nomSite = :nomSite";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([":nomSite" => $nom_site]);
  }
}