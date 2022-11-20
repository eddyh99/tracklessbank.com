<form action="<?= base_url() ?>admin/fee/updatefee" method="post" class="col-12">
    <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
        value="<?php echo $this->security->get_csrf_hash(); ?>">
    <input type="hidden" name="currency" value="<?= $currency ?>">

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
                        FREEDY BANK Fee for <?= $currency ?>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Topup</label>
                            <input type="text" id="topup" name="topup" class="form-control"
                                value="<?= $fee["topup"] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wallet to Bank Local</label>
                            <input type="text" id="walletbank_local" name="walletbank_local" class="form-control"
                                value="<?= $fee["walletbank_local"] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wallet to International</label>
                            <input type="text" id="walletbank_inter" name="walletbank_inter" class="form-control"
                                value="<?= $fee["walletbank_inter"] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wallet to Wallet Send</label>
                            <input type="text" id="wallet2wallet" name="wallet2wallet_send" class="form-control"
                                value="<?= $fee["wallet2wallet_send"] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wallet to Wallet Receive</label>
                            <input type="text" id="wallet2wallet" name="wallet2wallet_receive" class="form-control"
                                value="<?= $fee["wallet2wallet_receive"] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Swap</label>
                            <input type="text" id="swap" name="swap" class="form-control" value="<?= $fee["swap"] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Referral Send</label>
                            <input type="text" id="referral_send" name="referral_send" class="form-control"
                                value="<?= $fee["ref_send"] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Referral Receive</label>
                            <input type="text" id="referral_receive" name="referral_receive" class="form-control"
                                value="<?= $fee["ref_receive"] ?>">
                        </div>
                        <div class="mb-3">
                            <a href="<?= base_url() ?>admin/fee" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
</form>