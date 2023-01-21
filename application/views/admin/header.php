<div class="col-12 box-dashboard-freedy-top px-3 py-5 mt-3 mb-4 d-flex flex-row align-items-center">
    <div class="d-flex flex-column me-auto">
        <h3 class="fw-bold text-blue-freedy mb-4">MASTER WALLET <?= $_SESSION["mwallet"] ?></h3>
        <h6 class="fw-bold text-white">Balance</h6>
        <h4 class="fw-bold text-white"><?= $_SESSION["symbol"] ?>
            <?= number_format(balanceadmin($_SESSION["currency"]),2) ?></h4>
    </div>
    <img src="<?= base_url() ?>assets/img/tracklessbank/logo-polos.png" alt="" style="height: 75px;" class="me-5">
</div>