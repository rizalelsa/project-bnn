<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Data Permohonan Baru</a>
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pemohon</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Tanggal Acara</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($sosialisasi as $d) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $d['pemohon']; ?></td>
                                        <td><?= $d['nama_instansi']; ?></td>
                                        <td><?= $d['tanggal']; ?></td>
                                        <td><?= $d['waktu']; ?></td>
                                        <td><?= $d['status']; ?></td>
                                        <td>
                                            <a href="" class="badge badge-primary" data-toggle="modal" data-target="#modalDetail<?= $d['id'] ?>">detail</a>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modalEdit<?= $d['id'] ?>">edit</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modalHapus<?= $d['id'] ?>">delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Permohonan Sosialisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('pelayanan'); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-lg sm-6">
                        <div class="form-group">
                            <label for="user_id">Nama Pemohon</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">Pilih nama pemohon</option>
                                <?php foreach ($name as $n) : ?>
                                    <option value="<?= $n['id']; ?>"><?= $n['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg sm-6">
                        <div class="form-group">
                            <label for="no_hp">No. Hp</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. Hp">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="judul">Nama Instansi</label>
                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Masukkan Nama Instansi">
                </div>
                <div class="form-group">
                    <label for="nama_instansi">Alamat Instansi</label>
                    <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" placeholder="Masukkan Alamat Instansi">
                </div>
                <div class="form-group row">
                    <div class="col-lg sm-6">
                        <div class="form-group">
                            <label for="alamat_instansi">Tanggal Acara</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                    </div>
                    <div class="col-lg sm-3">
                        <div class="form-group">
                            <label for="waktu1">Waktu Mulai</label>
                            <input type="time" class="form-control" id="waktu1" name="waktu1">
                        </div>
                    </div>
                    <div class="col-lg sm-3">
                        <div class="form-group">
                            <label for="waktu2">Waktu Selesai</label>
                            <input type="time" class="form-control" id="waktu2" name="waktu2">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file" id="customFile" lang="es">
                        <input type="file" class="custom-file-input" id="berkas" name="berkas">
                        <label class="custom-file-label" for="berkas">
                            Masukkan berkas (Surat Permohononan)
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-control">
                        <option value="">---------------------------Pilih Status---------------------------</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Sedang Diproses">Sedang diproses</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal Detail Sosialisasi -->
<?php foreach ($sosialisasi as $d) { ?>
    <div class="modal fade" id="modalDetail<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetail">Detail Data Permohonan Sosialisasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('pelayanan/detailSosialisasi/' . $d['id']); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Nama Pemohon</label>
                        <input type="text" class="form-control" value="<?= $user['name']; ?>" readonly>
                        <input type="hidden" name="user_id" id="user_id" value="<?= $user['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="judul">No. Hp</label>
                        <input type="text" class="form-control" value="<?= $d['no_hp']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul">Nama Instansi</label>
                        <input type="text" class="form-control" value="<?= $d['nama_instansi']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul">Alamat Instansi</label>
                        <input type="text" class="form-control" value="<?= $d['alamat_instansi']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul">Tanggal Acara</label>
                        <input type="text" class="form-control" value="<?= $d['tanggal']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul">Waktu</label>
                        <input type="text" class="form-control" value="<?= $d['waktu']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul">Berkas (Surat Permohonan Sosialisasi)</label>
                        <input type="text" class="form-control" value="<?= $d['berkas']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul">Status Permohonan</label>
                        <input type="text" class="form-control" value="<?= $d['status']; ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Edit Sosialisasi -->
<?php foreach ($sosialisasi as $d) { ?>
    <div class="modal fade" id="modalEdit<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdit">Edit Data Permohonan Sosialisasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('pelayanan/editSosialisasi/' . $d['id']); ?>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judul">Nama Pemohon</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <?php foreach ($name as $n) : ?>
                                        <option value="<?= $n['id']; ?>"><?= $n['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_hp">No. Hp</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= $d['no_hp']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="judul">Nama Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" value="<?= $d['nama_instansi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="judul">Alamat Instansi</label>
                        <input type="text" name="alamat_instansi" class="form-control" value="<?= $d['alamat_instansi']; ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg sm-6">
                            <div class="form-group">
                                <label for="alamat_instansi">Tanggal Acara</label>
                                <input type="date" class="form-control" id=" tanggal" name="tanggal" value="<?= $d['tanggal']; ?>">
                            </div>
                        </div>
                        <div class="col-lg sm-3">
                            <div class="form-group">
                                <label for="waktu1">Waktu Mulai</label>
                                <?php $waktu = explode(' sampai ', $d['waktu']) ?>
                                <input value="<?= $waktu[0] ?>" type="time" class="form-control" id="waktu1" name="waktu1">
                            </div>
                        </div>
                        <div class="col-lg sm-3">
                            <div class="form-group">
                                <label for="waktu2">Waktu Selesai</label>
                                <?php $waktu = explode(' sampai ', $d['waktu']) ?>
                                <input value="<?= $waktu[1] ?>" type="time" class="form-control" id="waktu2" name="waktu2">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="berkas">Berkas (Surat Permohonan Sosialisasi)</label>
                        <input type="text" name="berkas" class="form-control" value="<?= $d['berkas']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <div class="custom-file" id="customFile" lang="es">
                            <input type="file" class="custom-file-input" id="berkas" name="berkas">
                            <label class="custom-file-label" for="berkas">
                                Masukkan berkas (Surat Permohononan)
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Permohonan</label>
                        <select name="status" id="status" class="form-control">
                            <option value="<?= $d['status']; ?>">Disetujui</option>
                            <option value="<?= $d['status']; ?>">Sedang diproses</option>
                            <option value="<?= $d['status']; ?>">Ditolak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Delete -->
<?php foreach ($sosialisasi as $d) { ?>
    <div class="modal modal-warning fade" id="modalHapus<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
        <div class="modal-dialog bg-warning" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapus">Hapus Data Permohonan Sosialisasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('pelayanan/hapusPermohonan'); ?>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="fas fa-exclamation-triangle fa-4x"></i>
                        <h4 class="heading mt-4">Anda yakin ingin menghapus data permohonan ini?</h4>
                        <input type="hidden" name="id-data" value="<?= $d['id'] ?>">

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