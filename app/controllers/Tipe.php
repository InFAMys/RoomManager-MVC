<?php

class Tipe extends Controller {
    public function index() {
        $data['title'] = "List Tipe Kamar | RoomManager";
        $data['tipe_kamar'] = $this->model('TipeModel')->getAllTipe();
        $this->view('templates/header', $data);
        $this->view('tipe/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['title'] = "Detail Tipe Kamar";
        $data['tipe_kamar'] = $this->model('TipeModel')->getTipeById($id);
        $this->view('templates/header', $data);
        $this->view('tipe/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('TipeModel')->tambahDataTipe($_POST) > 0) {
            Flash::setFlash('Berhasil', 'Ditambahkan!', 'success');
            header('Location: ' . BASEURL . '/tipe');
            exit;
        } else {
            Flash::setFlash('Gagal', 'Ditambahkan!', 'danger');
            header('Location: ' . BASEURL . '/tipe');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('TipeModel')->hapusDataTipe($id) > 0) {
            Flash::setFlash('Berhasil', 'Dihapus!', 'success');
            header('Location: ' . BASEURL . '/tipe');
            exit;
        } else {
            Flash::setFlash('Gagal', 'Dihapus!', 'danger');
            header('Location: ' . BASEURL . '/tipe');
            exit;
        }
    }

    public function getEdit() {
        echo json_encode($this->model('tipeModel')->getTipeById($_POST['id']));
    }

    public function edit() {
        if($this->model('TipeModel')->editDataTipe($_POST) > 0) {
            Flash::setFlash('Berhasil', 'Diedit!', 'success');
            header('Location: ' . BASEURL . '/tipe');
            exit;
        } else {
            Flash::setFlash('Gagal', $this->model('TipeModel')->editDataTipe($_POST), 'danger');
            header('Location: ' . BASEURL . '/tipe');
            exit;
        }
    }

}