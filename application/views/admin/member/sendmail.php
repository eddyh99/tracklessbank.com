<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card mb-5 mt-3">
                <div class="card-header fw-bold">
                    <i class="fas fa-envelope me-1"></i>
                    Send Email
                </div>
                <div class="card-body">
                    <form action="<?= base_url() ?>m3rc4n73/member/sendmail_proses" method="post" id="form_submit"
                        onsubmit="return validate()">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="card-body">
                            <?php if (@isset($_SESSION["failed"])) { ?>
                            <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <?php if (@isset($_SESSION["success"])) { ?>
                            <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>

                            <div class=" my-3 row">
                                <label for="bank" class="col-sm-2 col-form-label">Bank</label>
                                <div class="col-sm-10">
                                    <select name="bank" id="bank" class="form-select">
                                        <option value="all">All Bank</option>
                                        <?php foreach ($bank as $dt) { ?>
                                        <option value="<?= $dt->id ?>"><?= $dt->bank_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label" for="tujuan">
                                    Email
                                </label>
                                <select class="form-control" id="tujuan" name="tujuan[]" multiple
                                    data-placeholder="Select an Email" required>

                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" id="all" type="checkbox" value="all" name="all">
                                    <label class="form-check-label" for="all">
                                        Select All
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" required>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-12 form-label">Message</label>
                                <div class="input-group">
                                    <div class="col-12">
                                        <textarea name="message" id="message" class="summernote" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button id="btnconfirm"
                                    class="btn btn-freedy-blue px-4 py-2 mx-auto shadow-none">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>