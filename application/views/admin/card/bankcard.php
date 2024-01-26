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
            <div class="col-12 card mt-3">
                <div class="card-header fw-bold">
                    <i class="fas fa-bank me-1"></i>
                    Card Bank Account
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Account Holder</label>
                        <input class="form-control" type="text" name="name_circuit"
                            value="<?= @$card->registered_name ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">IBAN</label>
                        <input class="form-control" type="text" name="number_circuit"
                            value="<?= @$card->iban ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Causal</label>
                        <input class="form-control" type="text" name="routing_circuit"
                            value="<?= @$card->causal ?>" readonly>
                    </div>
                    <div class="col-12 my-3 mb-5 d-grid gap-2">
                        <a href="<?=base_url()?>m3rc4n73/card/editbankcard" id="btnconfirm" class="btn btn-freedy-blue px-4 py-2 shadow-none">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>