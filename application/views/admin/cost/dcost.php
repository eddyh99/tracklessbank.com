<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

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
            <div class="col-12 card mb-5 mt-3">
                <div class="card-header fw-bold">
                    Default Cost
                </div>
                <div class="card-body">

                    <form action="<?= base_url() ?>m3rc4n73/cost/editdcost" method="post">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row mb-3">
                            <label for="currency_dcost" class="col-sm-2 col-form-label">Currency</label>
                            <div class="col-sm-10">
                                <select name="currency" id="currency_dcost" class="form-select">
                                    <option value="">-Select Currency-</option>
                                    <?php foreach ($currency as $dt) { ?>
                                    <option value="<?= $dt->currency ?>"><?= $dt->name ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback d-grid" id="notifcurr">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="bank_dcost" class="col-sm-2 col-form-label">Bank</label>
                            <div class="col-sm-10">
                                <select name="bank" id="bank_dcost" class="form-select">
                                    <option value="">-Select Bank-</option>
                                    <?php foreach ($bank as $dt) { ?>
                                    <option value="<?= $dt->id ?>"><?= $dt->bank_name ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback d-grid" id="notifbank">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Topup</label>
                            <input type="text" id="topup" name="topup" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wallet sender</label>
                            <input type="text" id="wallet_sender" name="wallet_sender" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wallet receiver</label>
                            <input type="text" id="wallet_receiver" name="wallet_receiver" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Walletbank circuit</label>
                            <input type="text" id="walletbank_circuit" name="walletbank_circuit" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Walletbank outside</label>
                            <input type="text" id="walletbank_outside" name="walletbank_outside" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Swap</label>
                            <input type="text" id="swap" name="swap" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <button id="editfee" class="btn btn-freedy-blue px-4 py-2 mx-auto shadow-none">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>