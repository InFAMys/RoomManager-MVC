<?php

class Kamar extends Controller {
    public function index() {
        $data['title'] = "List Kamar | RoomManager";
        $data['kamar'] = $this->model('KamarModel')->getAllKamar();
        $data['ketersediaan'] = $this->model('KamarModel')->getAllKetersediaan();
        $data['tipe_kamar'] = $this->model('KamarModel')->getAllTipe();
        $this->view('templates/header', $data);
        $this->view('kamar/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['title'] = "Detail Kamar";
        $data['kamar'] = $this->model('KamarModel')->getKamarById($id);
        $this->view('templates/header', $data);
        $this->view('kamar/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('KamarModel')->tambahDataKamar($_POST) > 0) {
            Flash::setFlash('Berhasil', 'Ditambahkan!', 'success');
            header('Location: ' . BASEURL . '/kamar');
            exit;
        } else {
            Flash::setFlash('Gagal', 'Ditambahkan!', 'danger');
            header('Location: ' . BASEURL . '/kamar');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('KamarModel')->hapusDataKamar($id) > 0) {
            Flash::setFlash('Berhasil', 'Dihapus!', 'success');
            header('Location: ' . BASEURL . '/kamar');
            exit;
        } else {
            Flash::setFlash('Gagal', 'Dihapus!', 'danger');
            header('Location: ' . BASEURL . '/kamar');
            exit;
        }
    }

    public function getEdit() {
        echo json_encode($this->model('KamarModel')->getKamarById($_POST['id']));
    }

    public function edit() {
        if($this->model('KamarModel')->editDataKamar($_POST) > 0) {
            Flash::setFlash('Berhasil', 'Diedit!', 'success');
            header('Location: ' . BASEURL . '/kamar');
            exit;
        } else {
            Flash::setFlash('Gagal', $this->model('KamarModel')->editDataKamar($_POST), 'danger');
            header('Location: ' . BASEURL . '/kamar');
            exit;
        }
    }

}