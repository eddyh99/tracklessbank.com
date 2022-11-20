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
                    <form action="<?= base_url() ?>admin/mwallet/wdconfirm" method="post">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="transfer_type" value="circuit">
                        <?php if (($_SESSION["currency"] == "AED") || ($_SESSION["currency"] == "EUR")) { ?>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="recipient" id="us1"
                                placeholder="Recipient's Name">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="account_number" id="us2" placeholder="IBAN">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="amount" id="us3" placeholder="Amount"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="causal" id="us4" placeholder="Causal">
                        </div>
                        <?php } elseif ($_SESSION["currency"] == "USD") { ?>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="recipient" id="inter1"
                                placeholder="Recipient">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="account_number" id="inter2"
                                placeholder="Account Number">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="swift" id="inter3"
                                placeholder="Routing Number">
                        </div>
                        <div class="mb-3">
                            <select name="account_type" class="form-select">
                                <option value="saving">Saving</option>
                                <option value="checking">Checking</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="amount" id="inter4"
                                placeholder="<?= $_SESSION['balance'] ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="causal" id="inter5" placeholder="Causal">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="address" id="inter6"
                                placeholder="Recipient Address">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="city" id="inter7"
                                placeholder="Recipient City">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="state" id="inter8"
                                placeholder="Recipient State">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="postalcode" id="inter9"
                                placeholder="Recipient Postalcode">
                        </div>
                        <?php } ?>
                        <div class="col-12 mb-3">
                            <a href="<?= base_url() ?>admin/mwallet/withdraw"
                                class="btn btn-freedy-white px-4 py-2 me-2 shadow-none">Cancel</a>
                            <button class="btn btn-freedy-blue px-4 py-2 mx-2 shadow-none">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>