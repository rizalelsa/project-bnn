<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Data Permohonan Baru</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama Instansi</th>
                        <th scope="col">Alamat Instansi</th>
                        <th scope="col">Tanggal Acara</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sosialisasi as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['nama_instansi']; ?></td>
                            <td><?= $d['alamat_instansi']; ?></td>
                            <td><?= $d['tanggal']; ?></td>
                            <td><?= $d['status']; ?></td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
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
                <div class="form-group">
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Pilih nama pemohon</option>
                        <?php foreach ($name as $n) : ?>
                            <option value="<?= $n['id']; ?>"><?= $n['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. Hp">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Nama Instansi">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" placeholder="Alamat Instansi">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Acara">
                </div>
                <div class="form-group">
                    <input type="time" class="form-control" id="waktu1" name="waktu1" placeholder="Waktu Mulai">
                </div>
                <div class="form-group">
                    <input type="time" class="form-control" id="waktu2" name="waktu2" placeholder="Waktu Selesai">
                </div>
                <div class="form-group">
                    <div class="custom-file" id="customFile" lang="es">
                        <input type="file" class="custom-file-input" id="berkas" name="berkas">
                        <label class="custom-file-label" for="berkas">
                            Masukkan berkas (Surat Permohononan)
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