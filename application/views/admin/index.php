<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Card -->
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Sosialisasi (Bulan ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total['monthly'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Data Sosialisasi (Tahun ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total['year'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-2">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Data Yang Ada</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total['total'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card End -->

    <div class="row">
        <div class="col-lg mt-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <h3 class="h5 mb-4 text-gray-800">Data Permohonan Sosialisasi</h3>
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
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#modalTerima<?= $d['id'] ?>">Terima</a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#modalTolak<?= $d['id'] ?>">Tolak</a>
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
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Modal Detail Berita -->
    <?php foreach ($sosialisasi as $d) { ?>
        <div class="modal modal-warning fade" id="modalTerima<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTerima" aria-hidden="true">
            <div class="modal-dialog bg-warning" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTerima">Setujui Permohonan?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('admin'); ?>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="fas fa-exclamation-triangle fa-4x"></i>
                            <h4 class="heading mt-4">Anda yakin ingin menyetujui permohonan ini?</h4>
                            <input type="hidden" name="status" value="Disetujui">
                            <input type="hidden" name="id-status" value="<?= $d['id'] ?>">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-secondary">Ya</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php foreach ($sosialisasi as $d) { ?>
        <div class="modal modal-warning fade" id="modalTolak<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalTolak" aria-hidden="true">
            <div class="modal-dialog bg-warning" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTolak">Tolak Permohonan?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('admin'); ?>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="fas fa-exclamation-triangle fa-4x"></i>
                            <h4 class="heading mt-4">Anda yakin ingin menolak permohonan ini?</h4>
                            <input type="hidden" name="status" value="Ditolak">
                            <input type="hidden" name="id-status" value="<?= $d['id'] ?>">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-secondary">Ya</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php } ?>