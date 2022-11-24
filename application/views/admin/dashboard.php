<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 box-dashboard-freedy-top px-3 py-5 mt-3 mb-4 d-flex flex-row align-items-center">
                <h3 class="me-auto fw-bold text-blue-freedy">MASTER WALLET <?= $_SESSION["mwallet"] ?></h3>
                <img src="<?= base_url() ?>assets/img/tracklessbank/logo-polos.png" alt="" style="height: 75px;"
                    class="me-5">
            </div>
            <div class="col-12">
                <div class="title d-flex flex-row">
                    <span class="fw-bold text-blue-freedy me-auto">Currency</span>
                    <span class="fw-bold text-blue-freedy">Balance</span>
                </div>
                <div class="list-currency">
                    <?php foreach ($currency as $dt) {
                        if ($dt->currency == "USD") { ?>
                    <div class="my-3">
                        <a href="<?= base_url() ?>m3rc4n73/mwallet?cur=<?= $dt->currency ?>">
                            <div class="box-list fw-bold d-flex flex-row py-4 px-4">
                                <span class="me-auto"><?= $dt->currency ?></span>
                                <span><?= $dt->symbol ?> <?= $dt->amount ?></span>
                            </div>
                        </a>
                    </div>
                    <?php
                        }
                    }
                    foreach ($currency as $dt) {
                        if ($dt->currency == "EUR") {
                        ?>
                    <div class="my-3">
                        <a href="<?= base_url() ?>m3rc4n73/mwallet?cur=<?= $dt->currency ?>">
                            <div class="box-list fw-bold d-flex flex-row py-4 px-4">
                                <span class="me-auto"><?= $dt->currency ?></span>
                                <span><?= $dt->symbol ?> <?= $dt->amount ?></span>
                            </div>
                        </a>
                    </div>
                    <?php
                        }
                    }
                    foreach ($currency as $dt) {
                        if (($dt->currency != 'USD') && ($dt->currency != 'EUR')) {
                        ?>
                    <div class="my-3">
                        <a href="<?= base_url() ?>m3rc4n73/mwallet?cur=<?= $dt->currency ?>">
                            <div class="box-list fw-bold d-flex flex-row py-4 px-4">
                                <span class="me-auto"><?= $dt->currency ?></span>
                                <span><?= $dt->symbol ?> <?= $dt->amount ?></span>
                            </div>
                        </a>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</div>