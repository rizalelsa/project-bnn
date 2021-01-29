<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <?= form_open_multipart('pelayanan/permohonansosialisasi'); ?>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="user_id">Nama Lengkap</label>
            <input type="text" class="form-control" value="<?= $user['name']; ?>" readonly>
            <input type="hidden" name="user_id" id="user_id" value="<?= $user['id']; ?>">
            <!-- <?= form_error('user_id', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
        <div class="form-group col-md-4">
            <label for="no_hp">No Telepon</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp">
            <!-- <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama_instansi">Nama Instansi</label>
            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Masukkan nama instansi">
            <!-- <?= form_error('nama_instansi', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
        <div class="form-group col-md-4">
            <label for="alamat_instansi">Alamat Instansi</label>
            <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" placeholder="Masukkan alamat instansi">
            <!-- <?= form_error('alamat_instansi', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="berkas">Berkas (Surat Permohonan) </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="berkas" name="berkas">
                <label class="custom-file-label" for="berkas">Choose file</label>
            </div>
            <!-- <?= form_error('berkas', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
        <div class="form-group col-md-2">
            <label for="tanggal">Tanggal Acara</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
            <!-- <?= form_error('input_date', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
        <div class="form-group col-md-2">
            <label for="waktu1">Waktu Mulai </label>
            <input type="time" class="form-control" id="waktu1" name="waktu1">
            <!-- <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
        <div class="form-group col-md-2">
            <label for="waktu2">Waktu Selesai</label>
            <input type="time" class="form-control" id="waktu2" name="waktu2">
            <!-- <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?> -->
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?= form_close() ?>
</div>