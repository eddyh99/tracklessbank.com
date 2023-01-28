<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="col-12 col-md-6 card mb-5 mx-auto">
                <div class="card-header fw-bold">
                    <i class="fas fa-right-left me-1"></i>
                    Swap
                </div>
                <div class="card-body">
                    <form method="POST" id="swapconfirm" action="<?= base_url() ?>m3rc4n73/swap/confirm"
                        class="swap text-center" onsubmit="return validate()">

                        <?php if (@isset($_SESSION["failed"])) { ?>
                        <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } ?>

                        <div id="notifcalculate" class="col-12 alert alert-warning alert-dismissible fade show"
                            role="alert">
                            <span class="notif-login f-poppins" id="txtnotif"></span>
                        </div>

                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" id="amountget" name="amountget">
                        <input type="hidden" id="quoteid" name="quoteid">
                        <div class="swap-form-icon d-flex flex-row align-items-center my-4">
                            <label for=""><?= $_SESSION["symbol"] ?></label>
                            <input type="text" class="form-control text-end money-input" name="amount" id="amount"
                                placeholder="0.00">
                        </div>

                        <div class="swap-selection d-flex flex-column align-items-center justify-content-center">
                            <div class="col-12 col-sm-4">
                                <span class="t-select">Convert to</span>
                                <select name="toswap" id="toswap" class="form-select">
                                    <?php if ($_SESSION["currency"] != "USD") { ?>
                                    <option data-currency="&dollar;" value="USD">USD</option>
                                    <?php } ?>
                                    <?php if ($_SESSION["currency"] != "EUR") { ?>
                                    <option data-currency="&euro;" value="EUR">EUR</option>
                                    <?php } ?>
                                    <?php foreach ($currency as $dt) {
                                        if ($dt->status == 'active') {
                                            if (($dt->currency != "USD") && ($dt->currency != "EUR") && ($_SESSION["currency"] != $dt->currency)) {
                                    ?>
                                    <option data-currency="<?= $dt->symbol ?>" value="<?= $dt->currency ?>"
                                        <?php echo ($_SESSION["currency"] == $dt->currency) ? "selected" : "" ?>>
                                        <?= $dt->currency ?></option>
                                    <?php       }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="swap-form-icon d-flex flex-row align-items-center my-4">
                            <label for=""><span id="tocurrency"></span></label>
                            <input type="text" class="form-control text-end money-input" name="receive" id="receive"
                                placeholder="0.00" readonly>
                        </div>
                        <div class="row">
                            <div class="d-flex flex-row mt-4">
                                <button class="btn btn-freedy-blue px-4 py-2 mx-auto shadow-none" type="submit"
                                    id="btnconfirm">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>