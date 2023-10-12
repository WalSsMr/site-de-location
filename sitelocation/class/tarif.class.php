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
    
    public function getTarif($id) {
        $con = new PDO('mysql:host=localhost;dbname=rentfr', 'root', '');
        $sql = "SELECT * FROM tarif WHERE id_tarif = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
}