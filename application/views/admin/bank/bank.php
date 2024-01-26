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
            <form action="<?= base_url() ?>m3rc4n73/bank/editbank" method="post" id="form_submit"
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
                    ($_SESSION["currency"] == "TRY") ||
                    ($_SESSION["currency"] == "GBP") ||
                    ($_SESSION["currency"] == "RON")
                ) { ?>
                <div class="col-12 card mt-3">
                    <div class="card-header fw-bold">
                        <i class="fas fa-bank me-1"></i>
                        Circuit Bank Account
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Account Holder</label>
                            <input class="form-control" type="text" name="name_circuit"
                                value="<?= @$bank->name_circuit ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <?php if (
                                    ($_SESSION["currency"] == "NZD") ||
                                    ($_SESSION["currency"] == "CAD") ||
                                    ($_SESSION["currency"] == "HUF") ||
                                    ($_SESSION["currency"] == "RON") ||
                                    ($_SESSION["currency"] == "SGD") ||
                                    ($_SESSION["currency"] == "AUD")
                                ) { ?>
                            <label class="form-label">Account number</label>

                            <?php } else { ?>
                            <label class="form-label">IBAN</label>
                            <?php } ?>

                            <input class="form-control" type="text" name="number_circuit"
                                value="<?= @$bank->number_circuit ?>" readonly>
                        </div>

                        <?php if (
                                ($_SESSION["currency"] != "NZD") &&
                                ($_SESSION["currency"] != "HUF") &&
                                ($_SESSION["currency"] != "TRY")
                            ) { ?>
                        <div class="mb-3">
                            <?php
                                    if (($_SESSION["currency"] == "GBP")) {
                                    ?>
                            <label class="form-label">Sort code</label>

                            <?php } elseif (($_SESSION["currency"] == "AUD")) { ?>
                            <label class="form-label">BSB code</label>

                            <?php } elseif (($_SESSION["currency"] == "CAD")) { ?>
                            <label class="form-label">Institution number</label>

                            <?php } elseif (
                                        ($_SESSION["currency"] == "RON") ||
                                        ($_SESSION["currency"] == "SGD")
                                    ) { ?>
                            <label class="form-label">Bank code</label>

                            <?php } else { ?>
                            <label class="form-label">Swift</label>
                            <?php } ?>

                            <input class="form-control" type="text" name="routing_circuit"
                                value="<?= @$bank->routing_circuit ?>" readonly>
                        </div>
                        <?php } ?>

                        <?php if (
                                ($_SESSION["currency"] == "GBP") ||
                                ($_SESSION["currency"] == "CAD")
                            ) { ?>
                        <div class="mb-3">
                            <?php if (($_SESSION["currency"] == "GBP")) { ?>
                            <label class="form-label">Account number</label>

                            <?php }
                                    if (($_SESSION["currency"] == "CAD")) { ?>
                            <label class="form-label">Transit number</label>
                            <?php } ?>

                            <input class="form-control" type="text" name="transit_circuit"
                                value="<?= @$bank->transit_circuit ?>" readonly>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <input class="form-control" type="text" name="bankname_circuit"
                                value="<?= @$bank->bankname_circuit ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Address</label>
                            <input class="form-control" type="text" name="address_circuit"
                                value="<?= @$bank->address_circuit ?>" readonly>
                        </div>
                    </div>
                </div>
                <?php } else { ?>

                <?php }
                if (
                    ($_SESSION["currency"] == "USD") ||
                    ($_SESSION["currency"] == "EUR") ||
                    ($_SESSION["currency"] == "GBP")
                ) { ?>
                <div class="col-12 card mt-3">
                    <div class="card-header fw-bold">
                        <i class="fas fa-bank me-1"></i>
                        Outside Circuit
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Account Holder</label>
                            <input class="form-control" type="text" name="name_outside"
                                value="<?= @$bank->name_outside ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">IBAN</label>
                            <input class="form-control" type="text" name="iban_outside"
                                value="<?= @$bank->iban_outside ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <?php if (($_SESSION["currency"] == "GBP")) { ?>
                            <label class="form-label">SWIFT/BIC</label>

                            <?php } else { ?>
                            <label class="form-label">Swift</label>
                            <?php } ?>

                            <input class="form-control" type="text" name="bic_outside"
                                value="<?= @$bank->bic_outside ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <input class="form-control" type="text" name="bankname_outside"
                                value="<?= @$bank->bankname_outside ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Address</label>
                            <input class="form-control" type="text" name="address_outside"
                                value="<?= @$bank->address_outside ?>" readonly>
                        </div>
                    </div>
                </div>
                <?php }
                if (
                    ($_SESSION["currency"] == "USD") ||
                    ($_SESSION["currency"] == "EUR") ||
                    ($_SESSION["currency"] == "AUD") ||
                    ($_SESSION["currency"] == "NZD") ||
                    ($_SESSION["currency"] == "CAD") ||
                    ($_SESSION["currency"] == "HUF") ||
                    ($_SESSION["currency"] == "SGD") ||
                    ($_SESSION["currency"] == "TRY") ||
                    ($_SESSION["currency"] == "GBP") ||
                    ($_SESSION["currency"] == "RON")
                ) { ?>
                <div class="col-12 card mt-3">
                    <div class="card-header fw-bold">
                        <i class="fas fa-bank me-1"></i>
                        Others
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Min. Topup</label>
                            <input class="form-control" type="text" name="name_outside"
                                value="<?= @$bank->minimum ?>" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 my-3 mb-5 d-grid gap-2">
                    <button id="btnconfirm" class="btn btn-freedy-blue px-4 py-2 shadow-none">Edit</button>
                </div>
                <?php } ?>
            </form>
        </div>
    </main>
</div>