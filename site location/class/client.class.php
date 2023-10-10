<?php

require_once '../include/bdd.inc.php';

class client {

    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $cop_client;
    private $vil_client;
    private $mail_client;
    private $pass_client;
    private $status_client;
    private $valid_client;

    public function __construct($id, $nom, $prenom, $cop, $vil, $mail, $pass, $status, $valid) {
        $this->id_client = $id;
        $this->nom_client = $nom;
        $this->prenom_client = $prenom;
        $this->cop_client = $cop;
        $this->vil_client = $vil;
        $this->mail_client = $mail;
        $this->pass_client = $pass;
        $this->status_client = $status;
        $this->valid_client = $valid;
    }

    public function getCid() {
        return $this->id_client;
    }

    public function getCnom() {
        return $this->nom_client;
    }

    public function getCpre() {
        return $this->prenom_client;
    }

    public function getCcop() {
        return $this->cop_client;
    }

    public function getCvil() {
        return $this->vil_client;
    }

    public function getCmail() {
        return $this->mail_client;
    }

    public function getCpass() {
        return $this->pass_client;
    }

    public function getCstatus() {
        return $this->status_client;
    }

    public function getCvalid() {
        return $this->valid_client;
    }

    public function getAll() {

        $sql = "SELECT * FROM client";
        $stmt = $con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id) {

        $data = [':id' => $id];
        $sql = "SELECT * FROM client WHERE id_client = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insertC($nom, $prenom, $cop, $vil, $mail, $pass, $status, $valid) {
        require_once '../include/bdd.inc.php';

        $data = [
            ':nom' => $nom,
            ':pre' => $prenom,
            ':cop' => $cop,
            ':vil' => $vil,
            ':mail' => $mail,
            ':pass' => $pass,
            ':status' => $status,
            ':valid' => $valid
        ];

        $sql = "INSERT INTO client (nom_client, prenom_client, cop_client, vil_client, mail_client, pass_client, status_client, valid_client) VALUES (:nom, :pre, :cop, :vil, :mail, :pass, :status, :valid)";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }
    
    public function updateC($id, $nom, $prenom, $cop, $vil, $mail, $pass, $status, $valid) {
        require_once '../include/bdd.inc.php';

        $data = [
            ':id' => $id,
            ':nom' => $nom,
            ':pre' => $prenom,
            ':cop' => $cop,
            ':vil' => $vil,
            ':mail' => $mail,
            ':pass' => $pass,
            ':status' => $status,
            ':valid' => $valid
        ];

        $sql = "UPDATE client SET nom_client = :nom, prenom_client = :pre, cop_client = :cop, vil_client = :vil, mail_client = :mail, pass_client = :pass, status_client = :status, valid_client = :valid WHERE id_client = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }
    
    public function delete($id) {

        $data = [':id' => $id];
        $sql = "DELETE FROM client WHERE id_client = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }
    
    

}
