<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
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
        <div class="container-fluid px-4">
            <div class="col-12 my-4">
                <a href="<?= base_url() ?>m3rc4n73/member/sendmail" class="btn btn-freedy-blue fw-bold px-5 py-3">Send
                    Email</a>
            </div>
            <div class="col-12 card mb-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    List Member
                </div>
                <div class="card-body">
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
                    <table id="member" class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="align-middle">
                                <th>No.</th>
                                <th>Email</th>
                                <th>Unique Code</th>
                                <th>Referral Code</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="border-top: 0;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
</div>