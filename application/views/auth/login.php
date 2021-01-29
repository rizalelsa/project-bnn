<body>
    <section class="bg-cover bg-size--cover" data-spotlight="fullscreen" style="background-image: url('<?php echo base_url(); ?>assets/img/home.jpg')">
        <span class="mask bg-primary alpha-7"></span>
        <div class="py-lg pt-lg-xl">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                            </div>
                                            <?= $this->session->flashdata('message'); ?>
                                            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </button>
                                            </form>
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="<?php echo base_url(); ?>assets/js/theme.js"></script>
</body>