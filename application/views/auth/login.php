<div class="login bg-login">
    <div class="container">
        <div class="row d-flex d-lg-inline-grid justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-5 box-form">
                <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;" method="POST"
                    action="<?= base_url(); ?>m3rc4n73/auth/auth_login">
                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <?php if (@isset($_SESSION["failed"])) { ?>
                    <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>
                    <?php if (@isset($_SESSION["success"])) { ?>
                    <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                        <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>
                    <div class="col-12 mb-4 text-center">
                        <span class="my-3 title f-poppins">LOGIN</span>
                        <img src="<?= base_url(); ?>assets/img/tracklessbank/trackless.png" alt="">
                    </div>
                    <div class="col-12 mb-4">
                        <label for="email" class="form-label f-publicsans">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control f-publicsans" id="email" name="email"
                                placeholder="Email" required>
                            <div class="input-group-text">
                                <span>
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="password" class="form-label f-publicsans">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control f-publicsans" id="password"
                                placeholder="Password" required>
                            <div class="input-group-text">
                                <span>
                                    <i class="far fa-eye" id="togglePassword" style="cursor: pointer"
                                        toggle="#password"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-auto">
                        <div class="d-flex justify-content-between">
                            <!-- <a href="<?= base_url(); ?>m3rc4n73/auth/signup" class="f-publicsans">Sign up</a> -->
                            <a href="<?= base_url(); ?>m3rc4n73/auth/forget_pass" class="f-publicsans">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div class="col-12 d-grid gap-2">
                        <button type="submit" class="btn btn-login f-roboto">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="footer-login col-12"></div> -->