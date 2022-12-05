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
                    <form action="<?= base_url() ?>m3rc4n73/cost/editbcost_prosses" method="post" id="form_submit"
                        onSubmit="return validate()">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row mb-3">
                            <label for="currency_dcost" class="col-sm-2 col-form-label">Currency</label>
                            <div class="col-sm-10">
                                <select name="currency" id="currency_dcost" class="form-select" disabled>
                                    <option value="">-Select Currency-</option>
                                    <?php foreach ($currency as $dt) { ?>
                                    <option value="<?= $dt->currency ?>"
                                        <?php echo ($dt->currency == $curr) ? "selected" : "" ?>>
                                        <?= $dt->name ?></option>
                                    <?php } ?>
                                </select>
                                <input type="text" id="currency" name="currency" class="form-control"
                                    value="<?= $curr ?>" hidden>
                            </div>
                        </div>
                        <?php
                        if (
                            ($currency == "USD") ||
                            ($currency == "EUR")
                        ) { ?>
                        <div class="mb-3" id="topup_circuit_fxd_div">
                            <label class="form-label">Topup Circuit (Fixed)</label>
                            <input type="text" id="topup_circuit_fxd" name="topup_circuit_fxd" class="form-control"
                                value="<?= $bcost['topup_circuit_fxd']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <div class="mb-3" id="topup_circuit_pct_div">
                            <label class="form-label">Topup Circuit (%)</label>
                            <input type="text" id="topup_circuit_pct" name="topup_circuit_pct" class="form-control"
                                value="<?= $bcost['topup_circuit_pct']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <div class="mb-3" id="topup_outside_fxd_div">
                            <label class="form-label">Topup Outside (Fixed)</label>
                            <input type="text" id="topup_outside_fxd" name="topup_outside_fxd" class="form-control"
                                value="<?= $bcost['topup_outside_fxd']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <div class="mb-3" id="topup_outside_pct_div">
                            <label class="form-label">Topup Outside (%)</label>
                            <input type="text" id="topup_outside_pct" name="topup_outside_pct" class="form-control"
                                value="<?= $bcost['topup_outside_pct']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <?php
                        } ?>
                        <?php
                        if (($currency == "AUD") ||
                            ($currency == "NZD") ||
                            ($currency == "CAD") ||
                            ($currency == "HUF") ||
                            ($currency == "SGD") ||
                            ($currency == "TRY")
                        ) {
                        ?>
                        <div class="mb-3" id="topup_circuit_fxd_div">
                            <label class="form-label">Topup Circuit (Fixed)</label>
                            <input type="text" id="topup_circuit_fxd" name="topup_circuit_fxd" class="form-control"
                                value="<?= $bcost['topup_circuit_fxd']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <div class="mb-3" id="topup_circuit_pct_div">
                            <label class="form-label">Topup Circuit (%)</label>
                            <input type="text" id="topup_circuit_pct" name="topup_circuit_pct" class="form-control"
                                value="<?= $bcost['topup_circuit_pct']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <?php
                        } ?>

                        <div class="mb-3" id="transfer_circuit_fxd_div">
                            <label class="form-label">Walletbank Circuit (Fixed)</label>
                            <input type="text" id="transfer_circuit_fxd" name="transfer_circuit_fxd"
                                class="form-control" value="<?= $bcost['transfer_circuit_fxd']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <div class="mb-3" id="transfer_circuit_pct_div">
                            <label class="form-label">Walletbank Circuit (%)</label>
                            <input type="text" id="transfer_circuit_pct" name="transfer_circuit_pct"
                                class="form-control" value="<?= $bcost['transfer_circuit_pct']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>

                        <?php
                        if (($currency == "USD") ||
                            ($currency == "EUR")
                        ) {
                        ?>
                        <div class="mb-3" id="transfer_outside_fxd_div">
                            <label class="form-label">Walletbank Outside (Fixed)</label>
                            <input type="text" id="transfer_outside_fxd" name="transfer_outside_fxd"
                                class="form-control" value="<?= $bcost['transfer_outside_fxd']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <div class="mb-3" id="transfer_outside_pct_div">
                            <label class="form-label">Walletbank Outside (%)</label>
                            <input type="text" id="transfer_outside_pct" name="transfer_outside_pct"
                                class="form-control" value="<?= $bcost['transfer_outside_pct']; ?>"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');input(this);">
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <button id="btnconfirm"
                                class="btn btn-freedy-blue px-4 py-2 mx-auto shadow-none">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>