<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card mt-3">
                <div class="card-header fw-bold">
                    <i class="fas fa-money-bill-transfer me-1"></i>
                    Withdraw Confirmation
                </div>
                <div class="card-body">
                    <form action="<?= base_url() ?>m3rc4n73/mwallet/wdnotif" method="post" id="form_submit"
                        onsubmit="return validate()">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="transfer_type" value="<?= $data["transfer_type"] ?>">

                        <input type="hidden" name="amount" value="<?= $data["amount"] ?>">
                        <input type="hidden" name="accountHolderName" value="<?= $data["accountHolderName"] ?>">
                        <input type="hidden" name="causal" value="<?= $data["causal"] ?>">
                        <input type="hidden" name="accountNumber" value="<?= $data["accountNumber"] ?>">
                        <input type="hidden" name="IBAN" value="<?= $data["IBAN"] ?>">
                        <input type="hidden" name="accountType" value="<?= $data["accountType"] ?>">
                        <input type="hidden" name="city" value="<?= $data["city"] ?>">
                        <input type="hidden" name="postCode" value="<?= $data["postCode"] ?>">
                        <input type="hidden" name="firstLine" value="<?= $data["firstLine"] ?>">
                        <input type="hidden" name="state" value="<?= $data["state"] ?>">
                        <input type="hidden" name="countryCode" value="<?= $data["countryCode"] ?>">
                        <input type="hidden" name="abartn" value="<?= $data["abartn"] ?>">
                        <input type="hidden" name="swiftCode" value="<?= $data["swiftCode"] ?>">
                        <input type="hidden" name="bsbCode" value="<?= $data["bsbCode"] ?>">
                        <input type="hidden" name="sortCode" value="<?= $data["sortCode"] ?>">
                        <input type="hidden" name="bankCode" value="<?= $data["bankCode"] ?>">
                        <input type="hidden" name="branchCode" value="<?= $data["branchCode"] ?>">
                        <input type="hidden" name="institutionNumber" value="<?= $data["institutionNumber"] ?>">
                        <input type="hidden" name="transitNumber" value="<?= $data["transitNumber"] ?>">
                        <input type="hidden" name="taxId" value="<?= $data["taxId"] ?>">
                        <input type="hidden" name="rut" value="<?= $data["rut"] ?>">
                        <input type="hidden" name="phoneNumber" value="<?= $data["phoneNumber"] ?>">
                        <input type="hidden" name="legalType" value="<?= $data["legalType"] ?>">
                        <input type="hidden" name="type" value="<?= $data["type"] ?>">
                        <input type="hidden" name="ifscCode" value="<?= $data["ifscCode"] ?>">
                        <input type="hidden" name="clabe" value="<?= $data["clabe"] ?>">
                        <input type="hidden" name="email" value="<?= $data["email"] ?>">
                        <input type="hidden" name="dateOfBirth"
                            value="<?= date('Y-m-d', strtotime($data["dateOfBirth"])) ?>">

                        <div class="mb-3">
                            <span class="form-label">Receptients Name</span>
                            <span class="form-control border-0 px-0"><?= $data["accountHolderName"] ?></span>
                        </div>
                        <?php if (
                            (
                                ($_SESSION['currency'] == "EUR") &&
                                ($data["transfer_type"] == "circuit")
                            ) ||
                            ($_SESSION['currency'] == "AED") ||
                            ($_SESSION['currency'] == "DKK") ||
                            ($_SESSION['currency'] == "EGP") ||
                            (
                                ($_SESSION['currency'] == "GBP") &&
                                ($data["transfer_type"] == "outside")
                            ) ||
                            ($_SESSION['currency'] == "GEL") ||
                            ($_SESSION['currency'] == "HRK") ||
                            ($_SESSION['currency'] == "ILS") ||
                            ($_SESSION['currency'] == "NOK") ||
                            ($_SESSION['currency'] == "PKR") ||
                            ($_SESSION['currency'] == "PLN") ||
                            ($_SESSION['currency'] == "RON") ||
                            ($_SESSION['currency'] == "SEK") ||
                            ($_SESSION['currency'] == "TRY")
                        ) { ?>
                        <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                            <span class="form-label">IBAN</span>
                            <span class="form-control border-0 px-0"><?= $data["IBAN"] ?></span>
                        </div>
                        <?php } elseif (
                            ($_SESSION['currency'] == "MXN")
                        ) { ?>
                        <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                            <span class="form-label">Clabe</span>
                            <span class="form-control border-0 px-0"><?= $data["clabe"] ?></span>
                        </div>
                        <?php } else { ?>
                        <div class="col-12 list-send-wallet d-flex flex-column mb-3">
                            <span class="form-label">Account Number</span>
                            <span class="form-control border-0 px-0"><?= $data["accountNumber"] ?></span>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <span class="form-label">Amount</span>
                            <span
                                class="form-control border-0 px-0"><?= number_format($data["amount"], 2, ".", ",") ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="form-label">Transaction fee</span>
                            <span
                                class="form-control border-0 px-0"><?= number_format($data["fee"], 2, ".", ",") ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="form-label">Total Deducted</span>
                            <span
                                class="form-control border-0 px-0"><?= number_format($data["deduct"], 2, ".", ",") ?></span>
                        </div>
                        <div class="mb-3">
                            <span class="form-label">New Balance</span>
                            <span
                                class="form-control border-0 px-0"><?= number_format(balanceadmin($_SESSION["currency"]) - $data["deduct"], 2, ".", ",") ?></span>
                        </div>
                        <div class="mb-3">
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