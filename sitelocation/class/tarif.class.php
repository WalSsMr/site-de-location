<?php

require_once '../include/bdd.inc.php';

class tarif{
    private $id_tarif;
    private $dad_tarif;
    private $daf_tarif;
    private $prix_loc;
    private $id_bien;
    
    public function __construct($id, $dad, $daf, $prix, $id_bien) {
        $this->id_tarif = $id;
        $this->dad_tarif = $dad;
        $this->daf_tarif = $daf;
        $this->prix_loc = $prix;
        $this->id_bien = $id_bien;
    }
    
    public function getTarifId($id) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "SELECT * FROM tarif WHERE id_tarif = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function insertTarif($data) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "INSERT INTO tarif (dad_tarif, daf_tarif, prix_loc, id_bien) VALUES (:dad, :daf, :prix, :idBien)";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }
    
    public static function getAllTarif() {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "SELECT * FROM tarif";
        $stmt = $con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // mettre à jour un tarif
    public static function updateTarif($id, $data) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $data[':id'] = $id;
        $sql = "UPDATE tarif SET dad_tarif = :dad, daf_tarif = :daf, prix_loc = :prix, id_bien = :idBien WHERE id_tarif = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    // supprimer un tarif avec l' ID
    public static function deleteTarif($id) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "DELETE FROM tarif WHERE id_tarif = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
    
    
}