<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="col-12 my-5 text-center">
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
            </div>
            <div class="col-12 my-5 text-center">
                <?php
                if (
                    ($_SESSION["currency"] == "USD") ||
                    ($_SESSION["currency"] == "EUR") ||
                    ($_SESSION["currency"] == "AED")
                ) { ?>
                <a href="<?= base_url() ?>admin/mwallet/wdlocal"
                    class="btn btn-freedy-blue fw-bold px-5 py-3 mx-3">Local
                    Bank</a>
                <?php } else { ?>
                <div class="receive-note">
                    <span>If you want to topup <?= $_SESSION["currency"] ?>, You need to convert another
                        currency</span>
                </div>

                <?php } ?>

                <?php if (($_SESSION["currency"] == "USD") || ($_SESSION["currency"] == "EUR")) { ?>
                <a href="<?= base_url() ?>admin/mwallet/wdinter"
                    class="btn btn-freedy-blue fw-bold px-5 py-3 mx-3">Outside
                    Circuit</a>

                <?php } ?>
            </div>
        </div>
    </main>
</div>