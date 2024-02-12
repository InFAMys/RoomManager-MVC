<div class="mx-5 my-5">
<h1 class="text-center mb-2">List Kamar</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary tambahKamar my-3" data-bs-toggle="modal" data-bs-target="#inputModal">
    <i class="fa-solid fa-plus"></i> Tambah Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true" data-bs-theme="dark">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="inputModalLabel">Tambah Kamar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL; ?>/kamar/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                    <label for="no_kamar" class="form-label">No. Kamar</label>
                    <input type="text" class="form-control" id="no_kamar" name="no_kamar">
                </div>
                <div class="mb-3">
                    <label for="tipe_kamar" class="form-label">Tipe</label>
                    <select class="form-select" aria-label="tipe_kamar" id="tipe_kamar" name="tipe_kamar">
                        <?php foreach ($data['tipe_kamar'] as $k) :?>
                        <option value="<?= $k['id_tipe']; ?>"><?= $k['tipe']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tarif" class="form-label">Tarif</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" aria-label="Tarif Kamar" id="tarif" name="tarif">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" aria-label="status" id="status" name="status">
                        <?php foreach ($data['ketersediaan'] as $k) :?>
                        <option value="<?= $k['id_status']; ?>"><?= $k['status']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>

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
            <th scope="col">No. Kamar</th>
            <th scope="col">Tipe Kamar</th>
            <th scope="col">Tarif</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php $counter=1; ?>
            <?php foreach($data['kamar'] as $k) : ?>
                <tr>
                    <th scope="row"><?= $counter++ ?></th>
                    <td><?= $k['no_kamar']?></td>
                    <td><?= $k['tipe']?></td>
                    <td class="fTarif"><?= $k['tarif']?></td>
                    <?php if ($k['status'] == "Tersedia") {
                        echo '<td><span class="badge text-bg-success">'. $k['status'] . '</span></td>';
                    } else {
                        echo '<td><span class="badge text-bg-danger">'. $k['status'] . '</span></td>';
                    }
                    ?>
                    
                    <td>
                        <?php $id=$k['id_kamar']?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-<?= $k['id_kamar']?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="editModal-<?= $k['id_kamar']?>" tabindex="-1" aria-labelledby="editModal-<?= $k['id_kamar']?>" aria-hidden="true" data-bs-theme="dark">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel">Edit Kamar <?= $k['no_kamar']?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>/kamar/edit/" method="post">
                                    <input type="hidden" name="id" id="id" value="<?=$k['id_kamar']?>">
                                    <div class="mb-3">
                                        <label for="no_kamar" class="form-label">No. Kamar</label>
                                        <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="<?= $k['no_kamar']?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipe_kamar" class="form-label">Tipe</label>
                                        <select class="form-select" aria-label="tipe_kamar" id="tipe_kamar" name="tipe_kamar">
                                            <option value="<?= $k['id_tipe']; ?>"><?= $k['tipe']?>
                                            </option>
                                            <?php foreach ($data['tipe_kamar'] as $dt) :?>
                                                <?php
                                                    if ($k['id_tipe'] != $dt['id_tipe']) {
                                                    echo '<option value='.$dt['id_tipe'].'>'.$dt['tipe'].'</option>';
                                                    }
                                                ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tarif" class="form-label">Tarif</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" aria-label="Tarif Kamar" id="tarif" name="tarif" value="<?= $k['tarif']?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" aria-label="status" id="status" name="status">
                                            <option value="<?= $k['id_status']; ?>"><?= $k['status']; ?>
                                            </option>
                                            <?php foreach ($data['ketersediaan'] as $dk) :?>
                                                <?php
                                                if ($k['id_status'] != $dk['id_status']) {
                                                   echo '<option value='.$dk['id_status'].'>'.$dk['status'].'</option>';
                                                }
                                                    ?>
                                            <?php endforeach; ?>
                                        </select>

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
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $id?>">
                        <i class="fa-solid fa-trash-can"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-<?=$id?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" data-bs-theme="dark">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h1 class="modal-title my-5 text-center" id="deleteModalLabel">Hapus Kamar <?= $k['no_kamar']?> ?</h1>
                                    <div class="text-center mb-5">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a type="button" class="btn btn-danger" href="<?= BASEURL; ?>/kamar/hapus/<?=$id?>">Hapus</a>
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
