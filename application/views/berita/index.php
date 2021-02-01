<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Berita Baru</a>
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($berita as $b) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $b['judul']; ?></td>
                                        <td><?= $b['deskripsi']; ?></td>
                                        <td><img src="<?= base_url('assets/img/berita/') . $b['gambar']; ?>" width="100px"></td>
                                        <!-- <td><?= date('d F Y', $b['tanggal']); ?></td> -->
                                        <td>
                                            <a href="" class="badge badge-primary" data-toggle="modal" data-target="#modalDetail<?= $b['id'] ?>">detail</a>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modalEdit<?= $b['id'] ?>">edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modalHapus<?= $b['id'] ?>">delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambah">Tambah Data Permohonan Sosialisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('berita'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <div class="custom-file" id="customFile" lang="es">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label class="custom-file-label">
                            Gambar
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal Edit Berita -->
<?php foreach ($berita as $b) { ?>
    <div class="modal fade" id="modalEdit<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit">Edit Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('berita/editBerita/' . $b['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $b['judul'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?= $b['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/berita/') . $b['gambar']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9 my-auto">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Detail Berita -->
<?php foreach ($berita as $b) { ?>
    <div class="modal fade" id="modalDetail<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetail">Detail Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('berita/detailBerita/' . $b['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <div class="row">
                            <div class="col-lg-12 mx-auto mt-3">
                                <img src="<?= base_url('assets/img/berita/') . $b['gambar']; ?>" width="200px">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $b['judul'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" readonly><?= $b['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Posting</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= date('d F Y', $b['tanggal']); ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Delete -->
<?php foreach ($berita as $b) { ?>
    <div class="modal modal-warning fade" id="modalHapus<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
        <div class="modal-dialog bg-warning" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Hapus Data Posting Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('berita/hapusBerita'); ?>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="fas fa-exclamation-triangle fa-4x"></i>
                        <h4 class="heading mt-4">Anda yakin ingin menghapus data berita ini?</h4>
                        <input type="hidden" name="id-data" value="<?= $b['id'] ?>">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Ya</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Kembali</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>