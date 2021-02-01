<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/p2m.JPG') ?>" style="height: 550px;width:850px; " class="avatar avatar-lg mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Asesmen di lingkungan BNNK Nganjuk</h4>
                    <p>Senin, 11 Januari 2021</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/rapat1.jpeg') ?>" style="height: 550px;width:850px; " class="avatar avatar-lg mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Wawancara Pemilihan anggota P4GN oleh Kepala BNNK Nganjuk</h4>
                    <p>Rabu, 13 Januari 2021</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/rapat2.jpeg') ?>" style="height: 550px;width:800px; " class="avatar avatar-lg mx-auto d-block" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Konseling Rawat Jalan BNNK Nganjuk</h4>
                    <p>Senin, 18 Januari 2021</p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><br /><br />
    <hr />
    <div class="pr-md-4 text-dark text-center">
        <h4 class="heading h4 text-dark">
            Berita Terkini BNNK NGANJUK
        </h4>
    </div><br />

    <div class="form-group row">
        <?php foreach ($berita as $b) { ?>
            <div class="card mx-auto mt-4" style="max-width: 600px;">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-3">
                        <img src="<?= base_url('assets/img/berita/') . $b['gambar'] ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?= $b['judul'] ?></h5>
                            <p class="card-text text-dark"><?= $b['deskripsi'] ?></p>
                            <p class="card-text"><small class="text-muted">Diposting pada <?= date('d F Y', $b['tanggal']); ?></small></p>
                            <a href="<?php echo base_url(); ?>home/detailBerita" class="card-link card-title heading h7">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- <div class="card mx-auto" style="max-width: 600px;">
            <div class="row no-gutters">
                <div class="col-md-4 mt-3">
                    <img src="<?= base_url('assets/img/berita/') . $b['gambar'] ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Tutorial Card Bootstrap 4</h5>
                        <p class="card-text text-dark">Tutorial cara membuat card vertikal.</p>
                        <p class="card-text"><small class="text-muted">Diposting 19 menit lalu</small></p>
                        <a href="<?php echo base_url(); ?>home/detail" class="card-link card-title heading h7">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="form-group row">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="row no-gutters">
                <div class="col-md-4 mt-3">
                    <img src="<?php echo base_url(); ?>assets/img/home.jpeg" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Tutorial Card Bootstrap 4</h5>
                        <p class="card-text text-dark">Tutorial cara membuat card vertikal.</p>
                        <p class="card-text"><small class="text-muted">Diposting 19 menit lalu</small></p>
                        <a href="<?php echo base_url(); ?>home/detail" class="card-link card-title heading h7">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mx-auto" style="max-width: 600px;">
            <div class="row no-gutters">
                <div class="col-md-4 mt-3">
                    <img src="<?php echo base_url(); ?>assets/img/home.jpeg" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-dark">Tutorial Card Bootstrap 4</h5>
                        <p class="card-text text-dark">Tutorial cara membuat card vertikal.</p>
                        <p class="card-text"><small class="text-muted">Diposting 19 menit lalu</small></p>
                        <a href="<?php echo base_url(); ?>home/detail" class="card-link card-title heading h7">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- </div> -->
    <!-- </div> -->
</div>