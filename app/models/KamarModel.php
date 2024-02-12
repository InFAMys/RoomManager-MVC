<?php

class KamarModel {
    private $table = 'kamar';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKamar() {
        $this->db->query('SELECT * FROM '.$this->table  .', tipe_kamar, ketersediaan WHERE kamar.id_tipe=tipe_kamar.id_tipe AND kamar.id_status=ketersediaan.id_status ORDER BY no_kamar');
        return $this->db->resultSet();
    }

    public function getAllKetersediaan() {
        $this->db->query('SELECT * FROM ketersediaan');
        return $this->db->resultSet();
    }

    public function getAllTipe() {
        $this->db->query('SELECT * FROM tipe_kamar');
        return $this->db->resultSet();
    }

    public function getKamarById($id) {
        $this->db->query('SELECT * FROM ' .$this->table . ' WHERE id_kamar=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataKamar($data) {
        $query = "INSERT INTO kamar VALUES ('', :no_kamar, :id_tipe, :id_status, :tarif)";

        $this->db->query($query);
        $this->db->bind('no_kamar', $data['no_kamar']);
        $this->db->bind('id_tipe', $data['tipe_kamar']);
        $this->db->bind('id_status', $data['status']);
        $this->db->bind('tarif', $data['tarif']);

        $this->db->execute();

        return $this->db->rowCount();
        echo "<script>console.log('Debug Objects: " . $query . "' );</script>";
    }

    public function hapusDataKamar($id) {
        $query = 'DELETE FROM ' .$this->table . ' WHERE id_kamar=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function editDataKamar($data) {
        $query = 'UPDATE '  .$this->table . ' SET no_kamar=:no_kamar, id_tipe=:id_tipe, id_status=:id_status, tarif=:tarif WHERE id_kamar=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('no_kamar', $data['no_kamar']);
        $this->db->bind('id_tipe', $data['tipe_kamar']);
        $this->db->bind('id_status', $data['status']);
        $this->db->bind('tarif', $data['tarif']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}