<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 mt-3">
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
            <form action="<?= base_url() ?>m3rc4n73/bank/editbank_proses" method="post" id="form_submit"
                onsubmit="return validate()">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" name="transfer_type" value="circuit">
                <?php
                if (
                    ($_SESSION["currency"] == "USD") ||
                    ($_SESSION["currency"] == "EUR") ||
                    ($_SESSION["currency"] == "AUD") ||
                    ($_SESSION["currency"] == "NZD") ||
                    ($_SESSION["currency"] == "CAD") ||
                    ($_SESSION["currency"] == "HUF") ||
                    ($_SESSION["currency"] == "SGD") ||
                    ($_SESSION["currency"] == "TRY")
                ) { ?>
                <div class="col-12 card mt-3">
                    <div class="card-header fw-bold">
                        <i class="fas fa-bank me-1"></i>
                        Circuit Bank Account
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Registered Name</label>
                            <input class="form-control" type="text" name="c_registered_name"
                                placeholder="Registered Name" value="<?= @$bank->c_registered_name ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Number</label>
                            <input class="form-control" type="text" name="c_account_number" placeholder="Account Number"
                                value="<?= @$bank->c_account_number ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Routing Number</label>
                            <input class="form-control" type="text" name="c_routing_number" placeholder="Routing Number"
                                value="<?= @$bank->c_routing_number ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <input class="form-control" type="text" name="c_bank_name" placeholder="Bank Name"
                                value="<?= @$bank->c_bank_name ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Address</label>
                            <input class="form-control" type="text" name="c_bank_address" placeholder="Bank Address"
                                value="<?= @$bank->c_bank_address ?>">
                        </div>
                    </div>
                </div>
                <?php } else { ?>

                <?php } ?>
                <?php if (($_SESSION["currency"] == "USD") || ($_SESSION["currency"] == "EUR")) { ?>
                <div class="col-12 card mt-3">
                    <div class="card-header fw-bold">
                        <i class="fas fa-bank me-1"></i>
                        Outside Circuit
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Registered Name</label>
                            <input class="form-control" type="text" name="oc_registered_name"
                                placeholder="Registered Name" value="<?= @$bank->oc_registered_name ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">IBAN</label>
                            <input class="form-control" type="text" name="oc_iban" placeholder="IBAN"
                                value="<?= @$bank->oc_iban ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">BIC / SWIFT</label>
                            <input class="form-control" type="text" name="oc_bic" placeholder="BIC / SWIFT"
                                value="<?= @$bank->oc_bic ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <input class="form-control" type="text" name="oc_bank_name" placeholder="Bank Name"
                                value="<?= @$bank->oc_bank_name ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Address</label>
                            <input class="form-control" type="text" name="oc_bank_address" placeholder="Bank Address"
                                value="<?= @$bank->oc_bank_address ?>">
                        </div>
                    </div>
                </div>

                <?php } ?>

                <?php
                if (
                    ($_SESSION["currency"] == "USD") ||
                    ($_SESSION["currency"] == "EUR") ||
                    ($_SESSION["currency"] == "AUD") ||
                    ($_SESSION["currency"] == "NZD") ||
                    ($_SESSION["currency"] == "CAD") ||
                    ($_SESSION["currency"] == "HUF") ||
                    ($_SESSION["currency"] == "SGD") ||
                    ($_SESSION["currency"] == "TRY")
                ) { ?>
                <div class="col-12 my-3 mb-5 d-grid gap-2">
                    <button id="btnconfirm" class="btn btn-freedy-blue px-4 py-2 shadow-none">Confirm</button>
                </div>
                <?php } else { ?>
                <?php } ?>
            </form>
        </div>
    </main>
</div>