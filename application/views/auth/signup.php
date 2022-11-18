<div class="login bg-signin">
    <div class="container">
        <div class="row d-flex d-lg-inline-grid justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-5 box-form">
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
                <form class="form-login-freedy d-flex align-items-start flex-column" style="height: 100%;" method="POST"
                    action="<?= base_url(); ?>auth/register">
                    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="col-12 mb-4 text-center">
                        <span class="my-3 title f-poppins">SIGN UP</span>
                        <img src="<?= base_url(); ?>assets/img/tracklessbank/trackless.png" alt="">
                    </div>
                    <div class="col-12 mb-4">
                        <label for="email" class="form-label f-publicsans">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control f-publicsans" id="email" name='email' placeholder=""
                                required>
                            <div class="input-group-text">
                                <span>
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="email" class="form-label f-publicsans">Confirm Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control f-publicsans" id="email" name="confirmemail"
                                placeholder="" required>
                            <div class="input-group-text">
                                <span>
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="password1" class="form-label f-publicsans">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control f-publicsans" name="pass" id="password1"
                                placeholder="" required>
                            <div class="input-group-text">
                                <span>
                                    <i class="fa fa-eye" id="togglePassword1" style="cursor: pointer"
                                        toggle="#password1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="password2" class="form-label f-publicsans">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control f-publicsans" name="confirmpass" id="password2"
                                placeholder="" required>
                            <div class="input-group-text">
                                <span>
                                    <i class="fa fa-eye" id="togglePassword2" style="cursor: pointer"
                                        toggle="#password2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <label for="email" class="form-label f-publicsans">Refferal code <span class="text-mute">(
                                optional )</span>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control f-publicsans py-2" id="referral" name="referral"
                                placeholder="" value="<?= @$_GET["ref"] ?>">
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                    <div class="col-12 mt-5 d-grid gap-2">
                        <button type="submit" class="btn btn-login f-roboto">SIGN UP</button>
                        <a href="<?= base_url(); ?>auth/login">Do you have account ? LOG IN</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>