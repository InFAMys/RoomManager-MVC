<div class="mx-5 my-5">
<h1 class="text-center mb-2">List Tipe Kamar</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary tambahTipe my-3" data-bs-toggle="modal" data-bs-target="#inputTModal">
    <i class="fa-solid fa-plus"></i> Tambah Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="inputTModal" tabindex="-1" aria-labelledby="inputTModalLabel" aria-hidden="true" data-bs-theme="dark">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="inputTModalLabel">Tambah Tipe Kamar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL; ?>/tipe/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                    <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar">
                </div>
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <input type="text" class="form-control" id="fasilitas" name="fasilitas">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- FLASHER -->
        <?php FLASH::flash(); ?>
    <!-- END FLASHER -->

    <table class="table table-dark table-hover table-striped table-bordered text-center mt-3">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Tipe Kamar</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php $counter=1; ?>
            <?php foreach($data['tipe_kamar'] as $t) : ?>
                <tr>
                    <th scope="row"><?= $counter++ ?></th>
                    <td><?= $t['tipe']?></td>
                    <td><?= $t['fasilitas']?></td>
                    <td>
                        <!-- <a type="button" href="<?= BASEURL; ?>/tipe/edit/<?=$t['id_tipe']?>" data-bs-toggle="modal" data-bs-target="#inputTModal" class="btn btn-primary editTipe" data-id="<?=$t['id_tipe']?>"><i class="fa-solid fa-pen-to-square"></i></a> -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputTModal-<?=$t['id_tipe']?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="inputTModal-<?=$t['id_tipe']?>" tabindex="-1" aria-labelledby="inputTModal-<?=$t['id_tipe']?>" aria-hidden="true" data-bs-theme="dark">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="inputTModal-<?=$t['id_tipe']?>Label">Edit Tipe Kamar <?=$t['tipe']?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>/tipe/edit" method="post">
                                    <input type="hidden" name="id" id="id" value="<?=$t['id_tipe']?>">
                                    <div class="mb-3">
                                        <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                        <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" value="<?= $t['tipe']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="fasilitas" class="form-label">Fasilitas</label>
                                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?= $t['fasilitas']?>">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-<?=$t['id_tipe']?>">
                        <i class="fa-solid fa-trash-can"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-<?=$t['id_tipe']?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-bs-theme="dark">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h1 class="modal-title my-5 text-center" id="deleteModalLabel">Hapus Tipe <?=$t['tipe']?> ?</h1>
                                    <div class="text-center mb-5">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a type="button" class="btn btn-danger" href="<?= BASEURL; ?>/tipe/hapus/<?=$t['id_tipe']?>">Hapus</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
