        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-warning bg-warning topbar mb-4 static-top shadow">
                    <div class="sidebar-brand-icon">
                        <img src="<?= base_url('assets/img/'); ?>logobnn.png" width="80px"></img>
                    </div>
                    <a class="navbar-brand text-dark" href="#">SIMPEL-BNNK Nganjuk</a>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link text-dark" href="<?= base_url('home'); ?>">Home</a>
                                </li>

                                <!-- <li class="nav-item active">
                                    <a class="nav-link text-dark" href="<?= base_url('pelayanan/permohonan'); ?>">Pelayanan</a>
                                </li> -->
                                <li class="nav-item active">
                                    <a class="nav-link text-dark" href="<?= base_url('home/berita'); ?>">Berita Acara</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link text-dark" href="<?= base_url('home/about'); ?>">About</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="<?= base_url('auth'); ?>">LOGIN</a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->