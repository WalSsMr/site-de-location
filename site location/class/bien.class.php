<?php

require_once '../include/bdd.inc.php';

class Bien {

    private $id_bien;
    private $nom_bien;
    private $rue_bien;
    private $cop_bien;
    private $vil_bien;
    private $sup_bien;
    private $nb_couchage;
    private $nb_piece;
    private $nb_chambre;
    private $descriptif;
    private $statu_bien;
    private $id_type_bien;

    public function __construct($id, $nom, $rue, $cop, $vil, $sup, $nbCouchage, $nbPiece, $nbChambre, $descriptif, $statu, $idType) {
        $this->id_bien = $id;
        $this->nom_bien = $nom;
        $this->rue_bien = $rue;
        $this->cop_bien = $cop;
        $this->vil_bien = $vil;
        $this->sup_bien = $sup;
        $this->nb_couchage = $nbCouchage;
        $this->nb_piece = $nbPiece;
        $this->nb_chambre = $nbChambre;
        $this->descriptif = $descriptif;
        $this->statu_bien = $statu;
        $this->id_type_bien = $idType;
    }

    public function getIdBien() {
        return $this->id_bien;
    }

    public function getNomBien() {
        return $this->nom_bien;
    }

    public function getRueBien() {
        return $this->rue_bien;
    }

    public function getCopBien() {
        return $this->cop_bien;
    }

    public function getVilBien() {
        return $this->vil_bien;
    }

    public function getSupBien() {
        return $this->sup_bien;
    }

    public function getNbCouchage() {
        return $this->nb_couchage;
    }

    public function getNbPiece() {
        return $this->nb_piece;
    }

    public function getNbChambre() {
        return $this->nb_chambre;
    }

    public function getDescriptif() {
        return $this->descriptif;
    }

    public function getStatuBien() {
        return $this->statu_bien;
    }

    public function getIdTypeBien() {
        return $this->id_type_bien;
    }

    public function getAll() {
        require_once '../include/bdd.inc.php';

        $sql = "SELECT * FROM bien";
        $stmt = $con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id) {
        require_once '../include/bdd.inc.php';

        $data = [':id' => $id];
        $sql = "SELECT * FROM bien WHERE id_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($nom, $rue, $cop, $vil, $sup, $nbCouchage, $nbPiece, $nbChambre, $descriptif, $statu, $idType) {
        require_once '../include/bdd.inc.php';

        $data = [
            ':nom' => $nom,
            ':rue' => $rue,
            ':cop' => $cop,
            ':vil' => $vil,
            ':sup' => $sup,
            ':nbCouchage' => $nbCouchage,
            ':nbPiece' => $nbPiece,
            ':nbChambre' => $nbChambre,
            ':descriptif' => $descriptif,
            ':statu' => $statu,
            ':idType' => $idType
        ];

        $sql = "INSERT INTO bien (nom_bien, rue_bien, cop_bien, vil_bien, sup_bien, nb_couchage, nb_piece, nb_chambre, descriptif, statu_bien, id_type_bien) VALUES (:nom, :rue, :cop, :vil, :sup, :nbCouchage, :nbPiece, :nbChambre, :descriptif, :statu, :idType)";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    public function update($id, $nom, $rue, $cop, $vil, $sup, $nbCouchage, $nbPiece, $nbChambre, $descriptif, $statu, $idType) {
        require_once '../include/bdd.inc.php';

        $data = [
            ':id' => $id,
            ':nom' => $nom,
            ':rue' => $rue,
            ':cop' => $cop,
            ':vil' => $vil,
            ':sup' => $sup,
            ':nbCouchage' => $nbCouchage,
            ':nbPiece' => $nbPiece,
            ':nbChambre' => $nbChambre,
            ':descriptif' => $descriptif,
            ':statu' => $statu,
            ':idType' => $idType
        ];

        $sql = "UPDATE bien SET nom_bien = :nom, rue_bien = :rue, cop_bien = :cop, vil_bien = :vil, sup_bien = :sup, nb_couchage = :nbCouchage, nb_piece = :nbPiece, nb_chambre = :nbChambre, descriptif = :descriptif, statu_bien = :statu, id_type_bien = :idType WHERE id_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id) {
        require_once '../include/bdd.inc.php';

        $data = [':id' => $id];
        $sql = "DELETE FROM bien WHERE id_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

}
