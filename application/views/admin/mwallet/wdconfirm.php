<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card mt-3">
                <div class="card-header fw-bold">
                    <i class="fas fa-money-bill-transfer me-1"></i>
                    Withdraw International
                </div>
                <div class="card-body">
                    <form action="<?= base_url() ?>admin/mwallet/wdnotif" method="post">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="account_number" value="<?= $data["account_number"] ?>">
                        <input type="hidden" name="recipient" value="<?= $data["recipient"] ?>">
                        <input type="hidden" name="causal" value="<?= $data["causal"] ?>">
                        <input type="hidden" name="amount" value="<?= $data["amount"] ?>">
                        <input type="hidden" name="transfer_type" value="<?= $data["transfer_type"] ?>">
                        <input type="hidden" name="swift" value="<?= $data["swift"] ?>">
                        <?php
                        if ($_SESSION["currency"] == "USD") { ?>
                        <input type="hidden" name="bank_name" value="<?= $data["bank_name"] ?>">
                        <input type="hidden" name="address" value="<?= $data["address"] ?>">
                        <input type="hidden" name="account_type" value="<?= $data["account_type"] ?>">
                        <input type="hidden" name="city" value="<?= $data["city"] ?>">
                        <input type="hidden" name="state" value="<?= $data["state"] ?>">
                        <input type="hidden" name="postalcode" value="<?= $data["postalcode"] ?>">
                        <input type="hidden" name="country" value="<?= $data["country"] ?>">
                        <?php } ?>
                        <div class="mb-3">
                            <span class="form-label">Receptients Name</span>
                            <span class="form-control border-0 px-0"><?= $data["recipient"] ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="form-label">Amount</span>
                            <span class="form-control border-0 px-0"><?= $data["amount"] ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="form-label">Transaction fee</span>
                            <span class="form-control border-0 px-0"><?= $data["fee"] ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="form-label">Total Deducted</span>
                            <span class="form-control border-0 px-0"><?= $data["deduct"] ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="form-label">New Balance</span>
                            <span
                                class="form-control border-0 px-0"><?= balanceadmin($_SESSION["currency"]) - $data["deduct"] ?></span>
                        </div>
                        <div class="mb-3">
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