<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 col-md-6 card mb-5 mt-3">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Transactions
                </div>
                <div class="card-body">
                    <form method="POST" id="swapconfirm" action="<?= base_url() ?>admin/swap/notif" class="swap">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="quoteid" value="<?= $data["quoteid"] ?>">
                        <input type="hidden" name="toswap" value="<?= $data["target"] ?>">
                        <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                            <span>Amount</span>
                            <span><?= $data["amount"] ?></span>
                            <input type="text" class="form-control mb-4" name="amount" id="amount" placeholder="Amount"
                                value="<?= $data["amount"] ?>" hidden>
                        </div>
                        <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                            <span>New Balance</span>
                            <span><?= $_SESSION['balance'] - $data["amount"] ?></span>
                        </div>
                        <div class="row">
                            <div class="d-flex flex-row mt-4">
                                <a href="<?= base_url() ?>admin/swap"
                                    class="btn btn-freedy-white px-4 py-2 me-2 shadow-none">Cancel</a>
                                <button class="btn btn-freedy-blue px-4 py-2 shadow-none" type="submit">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>