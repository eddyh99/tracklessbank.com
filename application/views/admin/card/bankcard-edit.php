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
            <form action="<?= base_url() ?>m3rc4n73/card/editcard_proses" method="post" id="form_submit"
                onsubmit="return validate()">
                <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="col-12 card mt-3">
                    <div class="card-header fw-bold">
                        <i class="fas fa-bank me-1"></i>
                        Card Bank Account
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Account Holder</label>
                            <input class="form-control" type="text" name="registered_name"
                                value="<?= @$card->registered_name ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">IBAN</label>
                            <input class="form-control" type="text" name="iban"
                                value="<?= @$card->iban ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Causal</label>
                            <input class="form-control" type="text" name="causal"
                                value="<?= @$card->causal ?>">
                        </div>
                        <div class="col-12 my-3 mb-5 d-grid gap-2">
                            <button id="btnconfirm" class="btn btn-freedy-blue px-4 py-2 shadow-none">Confirm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>