<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
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
        <div class="container-fluid px-4">
            <div class="col-12 card mb-5 mt-3">
                <div class="card-header fw-bold">
                    FREEDY BANK Fee
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="currency" class="col-sm-2 col-form-label">Currency</label>
                        <div class="col-sm-10">
                            <select name="currency" id="currency" class="form-select">
                                <?php foreach ($currency as $dt) { ?>
                                <option value="<?= $dt->currency ?>"><?= $dt->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Topup</label>
                        <input type="text" id="topup" name="topup" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Wallet to Bank Local</label>
                        <input type="text" id="walletbank_local" name="walletbank_local" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Wallet to Bank International</label>
                        <input type="text" id="walletbank_inter" name="walletbank_inter" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Wallet to Wallet Send</label>
                        <input type="text" id="w2w_send" name="w2w_send" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Wallet to Wallet Receive</label>
                        <input type="text" id="w2w_receive" name="w2w_receive" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Swap</label>
                        <input type="text" id="swap" name="swap" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Referral Send</label>
                        <input type="text" id="referral_send" name="referral_send" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Referral Receive</label>
                        <input type="text" id="referral_receive" name="referral_receive" class="form-control" readonly>
                    </div>
                    <div class="text-start">
                        <a id="editfee" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>