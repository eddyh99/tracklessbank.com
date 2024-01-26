<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

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
                    <form action="<?= base_url() ?>m3rc4n73/cost/editdcost" method="post" id="form_submit"
                        onsubmit="return validate()">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="row mb-3">
                            <label for="currency_dcost" class="col-sm-2 col-form-label">Currency</label>
                            <div class="col-sm-10">
                                <select name="currency" id="currency_dcost" class="form-select">
                                    <option value="">-Select Currency-</option>
                                    <?php foreach ($currency as $dt) { ?>
                                    <option value="<?= $dt->currency ?>"><?= $dt->name ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback d-grid" id="notifcurr">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" id="topup_circuit_fxd_div">
                            <label class="form-label">Topup Circuit (Fixed)</label>
                            <input type="text" id="topup_circuit_fxd" name="topup_circuit_fxd" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="topup_circuit_pct_div">
                            <label class="form-label">Topup Circuit (%)</label>
                            <input type="text" id="topup_circuit_pct" name="topup_circuit_pct" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="topup_outside_fxd_div">
                            <label class="form-label">Topup Outside (Fixed)</label>
                            <input type="text" id="topup_outside_fxd" name="topup_outside_fxd" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="topup_outside_pct_div">
                            <label class="form-label">Topup Outside (%)</label>
                            <input type="text" id="topup_outside_pct" name="topup_outside_pct" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="wallet_sender_fxd_div">
                            <label class="form-label">Wallet Sender (Fixed)</label>
                            <input type="text" id="wallet_sender_fxd" name="wallet_sender_fxd" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="wallet_sender_pct_div">
                            <label class="form-label">Wallet Sender (%)</label>
                            <input type="text" id="wallet_sender_pct" name="wallet_sender_pct" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="wallet_receiver_fxd_div">
                            <label class="form-label">Wallet Receive (Fixed)</label>
                            <input type="text" id="wallet_receiver_fxd" name="wallet_receiver_fxd" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="wallet_receiver_pct_div">
                            <label class="form-label">Wallet Receive (%)</label>
                            <input type="text" id="wallet_receiver_pct" name="wallet_receiver_pct" class="form-control"
                                readonly>
                        </div>
                        <div class="mb-3" id="walletbank_circuit_fxd_div">
                            <label class="form-label">Walletbank Circuit (Fixed)</label>
                            <input type="text" id="walletbank_circuit_fxd" name="walletbank_circuit_fxd"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="walletbank_circuit_pct_div">
                            <label class="form-label">Walletbank Circuit (%)</label>
                            <input type="text" id="walletbank_circuit_pct" name="walletbank_circuit_pct"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="walletbank_outside_fxd_div">
                            <label class="form-label">Walletbank Outside (Fixed)</label>
                            <input type="text" id="walletbank_outside_fxd" name="walletbank_outside_fxd"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="walletbank_outside_pct_div">
                            <label class="form-label">Walletbank Outside (%)</label>
                            <input type="text" id="walletbank_outside_pct" name="walletbank_outside_pct"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="swap_div">
                            <label class="form-label">Swap (%)</label>
                            <input type="text" id="swap" name="swap" class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="swap_fxd_div">
                            <label class="form-label">Swap (Fixed)</label>
                            <input type="text" id="swap_fxd" name="swap_fxd" class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="card_fxd_div">
                            <label class="form-label">Card (Fixed)</label>
                            <input type="text" id="card_fxd" name="card_fxd" class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="card_ship_reg_div">
                            <label class="form-label">Shipping Card Regular (fixed)</label>
                            <input type="text" id="card_ship_reg" name="card_ship_reg"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3" id="card_ship_fast_div">
                            <label class="form-label">Shipping Card Fast (fixed)</label>
                            <input type="text" id="card_ship_fast" name="card_ship_fast"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <button id="btnconfirm"
                                class="btn btn-freedy-blue px-4 py-2 mx-auto shadow-none">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>