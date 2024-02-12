<?php

class TipeModel {
    private $table = 'tipe_kamar';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllTipe() {
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
    }

    public function getTipeById($id) {
        $this->db->query('SELECT * FROM ' .$this->table . ' WHERE id_tipe=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataTipe($data) {
        $query = "INSERT INTO tipe_kamar VALUES ('', :tipe, :fasilitas)";

        $this->db->query($query);
        $this->db->bind('tipe', $data['tipe_kamar']);
        $this->db->bind('fasilitas', $data['fasilitas']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataTipe($id) {
        $query = 'DELETE FROM ' .$this->table . ' WHERE id_tipe=:id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function editDataTipe($data) {
        $query = 'UPDATE '  .$this->table . ' SET tipe=:tipe, fasilitas=:fasilitas WHERE id_tipe=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('tipe', $data['tipe_kamar']);
        $this->db->bind('fasilitas', $data['fasilitas']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}