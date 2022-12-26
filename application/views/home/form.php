<!-- ======= Hero Section ======= -->
<section id="" class="hero d-flex align-items-center p-3 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="link-back p-0">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url(); ?>assets/images/exit.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 my-5">
                <div class="col-12 mb-5">
                    <h2 class="h2-form-bank fw-bold text-center">Start your own<br>
                        bank now</h2>
                </div>
                <div class="row align-items-center d-flex justify-content-center cube-content">
                    <div class="col-12 col-lg-8 p-0 p-lg-3 my-5">
                        <div class="box-form-bank px-4 px-lg-5 py-5 f-inter">
                            <?php if (@isset($_SESSION["failed"])) { ?>
                            <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= @$_SESSION["failed"] ?></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <?php if (@isset($_SESSION["success"])) { ?>
                            <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <h2 class="f-inter mb-4">Are you interested?</h2>
                            <a href="#">Apply here</a>
                            <form class="row g-3 needs-validation mt-4" action="<?= base_url() ?>link/mailproses"
                                method="POST" onsubmit="return validate()">
                                <input type="hidden" id="token"
                                    name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="col-lg-12 form-tracklesscrypto">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter your email"
                                        name="email" required>
                                </div>
                                <div class="col-lg-12 form-tracklesscrypto">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="company"
                                        placeholder="Enter your company website" name="company">
                                </div>
                                <div class="col-lg-12 form-tracklesscrypto">
                                    <label for="instagram" class="form-label">Instagram address</label>
                                    <input type="text" class="form-control" id="instagram"
                                        placeholder="Enter your instagram address" name="instagram">
                                </div>
                                <div class="col-lg-12 form-tracklesscrypto">
                                    <label for="twitter" class="form-label">Twitter address </label>
                                    <input type="text" class="form-control" id="twitter" name="twitter"
                                        placeholder="Enter your twitter address">
                                </div>
                                <div class="col-lg-12 form-tracklesscrypto">
                                    <label for="facebook" class="form-label">Facebook address </label>
                                    <input type="text" class="form-control" id="facebook" name="facebook"
                                        placeholder="Enter your facebook address">
                                </div>
                                <div class="col-lg-12 form-tracklesscrypto">
                                    <label for="linkedin" class="form-label">Linkedin address </label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin"
                                        placeholder="Linkedin address ">
                                </div>
                                <div class="col-lg-12 form-tracklesscrypto">
                                    <label for="linkedin" class="form-label">Bank name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="bank" name="bank"
                                        placeholder="Enter your Bank name" required>
                                </div>
                                <div class="col-12 text-center mt-5">
                                    <button id="btnconfirm" class="btn btn-tracklesscrypto py-2 px-5"
                                        type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->