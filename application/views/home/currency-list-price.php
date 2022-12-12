<!-- ======= Hero Section ======= -->
<section id="" class="hero d-flex align-items-center p-3 pt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="link-back p-0">
                    <a href="<?= base_url() ?>link/lern_transparency">
                        <img src="<?= base_url(); ?>assets/images/exit.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-10 my-5 mx-auto">
                <div class="px-0 px-md-3">
                    <?php
                    foreach ($currency as $dtcurr) {
                        if ($dtcurr->currency == $getcurrency) {
                            if ($dtcurr->status == 'active') {
                    ?>

                    <div class="col-12 mb-5 text-center currency-img-list">
                        <img src="<?= base_url() ?>assets/images/currency/<?= $getcurrency ?>.png"
                            alt="<?= $getcurrency ?>">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered border-green-tranckless">
                            <thead style="border: 2px solid #00DD9C;">
                                <tr>
                                    <th></th>
                                    <th>TOTAL</th>
                                    <th>BANK<br> SYSTEM COST</th>
                                    <th>PBS</th>
                                </tr>
                            </thead>
                            <tbody style="border: 2px solid #00DD9C;">
                                <tr>
                                    <td class="title">DOMESTIC<br> TOP UP</td>
                                    <td><?= number_format(($cost['topup_circuit_fxd'] + $wcost['topup_circuit_fxd']), 2, ".", ",") ?>
                                    </td>
                                    <td><?= number_format(($cost['topup_circuit_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format(($wcost['topup_circuit_fxd']), 2, ".", ",") ?></td>
                                </tr>
                                <tr>
                                    <td class="title">INTERNATIONAL<br> TOP UP</td>
                                    <td><?= number_format(($cost['topup_outside_fxd'] + $wcost['topup_outside_fxd']), 2, ".", ",") ?>
                                    </td>
                                    <td><?= number_format(($cost['topup_outside_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format(($wcost['topup_outside_fxd']), 2, ".", ",") ?></td>
                                </tr>
                                <tr>
                                    <td class="title">WALLET<br> TO WALLET SEND</td>
                                    <td><?= number_format(($cost['wallet_sender_fxd'] + $wcost['wallet_sender_fxd']), 2, ".", ",") ?>
                                    </td>
                                    <td><?= number_format(($cost['wallet_sender_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format((0), 2, ".", ",") ?></td>
                                </tr>
                                <tr>
                                    <td class="title">WALLET<br> TO WALLET RECEIVE</td>
                                    <td><?= number_format(($cost['wallet_receiver_fxd'] + $wcost['wallet_receiver_fxd']), 2, ".", ",") ?>
                                    </td>
                                    <td><?= number_format(($cost['wallet_receiver_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format((0), 2, ".", ",") ?></td>
                                </tr>
                                <tr>
                                    <td class="title">DOMESTIC<br> WITHDRAWAL</td>
                                    <td><?= number_format(($cost['walletbank_circuit_fxd'] + $wcost['transfer_circuit_fxd']), 2, ".", ",") ?>
                                    </td>
                                    <td><?= number_format(($cost['walletbank_circuit_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format(($wcost['transfer_circuit_fxd']), 2, ".", ",") ?></td>
                                </tr>
                                <tr>
                                    <td class="title">INTERNATIONAL<br> WITHDRAWAL</td>
                                    <td><?= number_format(($cost['walletbank_outside_fxd'] + $wcost['transfer_outside_fxd']), 2, ".", ",") ?>
                                    </td>
                                    <td><?= number_format(($cost['walletbank_outside_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format(($wcost['transfer_outside_fxd']), 2, ".", ",") ?></td>
                                </tr>
                                <tr>
                                    <td class="title">SWAP<br> CURRENCY</td>
                                    <td><?= number_format(($cost['swap_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format(($cost['swap_fxd']), 2, ".", ",") ?></td>
                                    <td><?= number_format(($cost['swap_fxd']), 2, ".", ",") ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                            } else {
                            ?>

                    <h4 class="f-lexend text-center my-3 text-blue-freedy">
                        Coming Soon!
                    </h4>
                    <?php
                            }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->