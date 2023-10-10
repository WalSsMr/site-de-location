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

    public function __construct($id_client, $nom_client, $prenom_client, 
            $cop_client, $vil_client, $mail_client, $pass_client, $status_client, 
            $valid_client) {
        
        
        
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

}
