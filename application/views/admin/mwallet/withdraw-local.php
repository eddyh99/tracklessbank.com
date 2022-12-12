<?php $this->load->view("admin/mwallet/countries-list"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card mt-3">
                <div class="card-header fw-bold">
                    <i class="fas fa-money-bill-transfer me-1"></i>
                    Withdraw Local bank
                </div>
                <div class="card-body">
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
                    <form action="<?= base_url() ?>m3rc4n73/mwallet/wdconfirm" method="post" id="form_submit"
                        onsubmit="return validate()">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="transfer_type" value="circuit">
                        <input type="hidden" name="currencycode" id="currencycode" value="<?= $currencycode ?>">

                        <?php
                        $data['type'] = "wdlocal";
                        $this->load->view('admin/mwallet/currency/' . @$_SESSION['currency'], $data);
                        ?>
                        <div class="col-12 mb-3">
                            <a href="<?= base_url() ?>m3rc4n73/mwallet/withdraw"
                                class="btn btn-freedy-white px-4 py-2 me-2 shadow-none">Cancel</a>
                            <button class="btn btn-freedy-blue px-4 py-2 mx-2 shadow-none"
                                id="btnconfirm">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>