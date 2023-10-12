<?php
require_once '../include/bdd.inc.php';

class type_bien {
    private $id_type_bien;
    private $lib_type_bien;
    
    public function __construct($id, $lib) {
        $this->id_type_bien = $id;
        $this->lib_type_bien = $lib;
    }
    
    public function getIdTyprBien() {
        return $this->id_type_bien;
    }

    public function getLibTypeBien() {
        return $this->lib_type_bien;
    }
    
    public function getAll() {

        $sql = "SELECT * FROM type_bien";
        $stmt = $con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOne($id) {

        $data = [':id' => $id];
        $sql = "SELECT * FROM type_bien WHERE id_type_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insert($lib) {
        require_once '../include/bdd.inc.php';

        $data = [
            ':lib' => $lib
        ];

        $sql = "INSERT INTO type_bien (id_type_bien, lib_type_bien) VALUES (:id, :lib)";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }
    
    public function update($id, $lib) {

        $data = [
            ':id' => $id,
            ':lib' => $lib
        ];

        $sql = "UPDATE type_bien SET id_type_bien = :id, lib_type_bien = :lib WHERE id_type_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }
    
    public function delete($id) {

        $data = [':id' => $id];
        $sql = "DELETE FROM type_bien WHERE id_type_bien = :id";
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
    }

}
