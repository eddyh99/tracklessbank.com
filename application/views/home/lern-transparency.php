<!-- ======= Hero Section ======= -->
<section id="" class="hero d-flex align-items-center p-3 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="link-back p-0">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url(); ?>assets/images/exit.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 my-5">
                <div class="col-12 mb-5 text-center">
                    <h2 class="text-green-trackless fw-bold">Clear and transparent prices</h2>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center">
                        <?php
                        foreach ($currency as $dt) {
                            if ($dt->currency == "USD") {
                        ?>
                        <div class="col-auto currency-img-list mx-1 my-2 mx-sm-2">
                            <a href="<?= base_url() ?>link/price_currency?currency=<?= $dt->currency ?>">
                                <img src="<?= base_url() ?>assets/images/currency/<?= $dt->currency ?>.png"
                                    alt="<?= $dt->currency ?>">
                            </a>
                        </div>
                        <?php
                            }
                        }
                        foreach ($currency as $dt) {
                            if ($dt->currency == "EUR") {
                            ?>

                        <div class="col-auto currency-img-list mx-1 my-2 mx-sm-2">
                            <a href="<?= base_url() ?>link/price_currency?currency=<?= $dt->currency ?>">
                                <img src="<?= base_url() ?>assets/images/currency/<?= $dt->currency ?>.png"
                                    alt="<?= $dt->currency ?>">
                            </a>
                        </div>
                        <?php
                            }
                        }
                        foreach ($currency as $dt) {
                            if ($dt->currency != "EUR" && $dt->currency != "USD") {
                            ?>
                        <div class="col-auto currency-img-list mx-1 my-2 mx-sm-2">
                            <a href="<?= base_url() ?>link/price_currency?currency=<?= $dt->currency ?>">
                                <img src="<?= base_url() ?>assets/images/currency/<?= $dt->currency ?>.png"
                                    alt="<?= $dt->currency ?>">
                            </a>
                        </div>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->