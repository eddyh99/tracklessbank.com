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
            <div class="col-12 card mb-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Category Business
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_GET["cat"])){
                            $cat    = explode("-",base64_decode($_GET["cat"]));
                            $id     = $cat[0];
                            $category = $cat[1];
                    ?>
                        <form action="<?= base_url() ?>m3rc4n73/business/updatecategory" method="post" id="form_submit">
                    <?php }else{?>
                        <form action="<?= base_url() ?>m3rc4n73/business/addcategory" method="post" id="form_submit">
                    <?php } ?>
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="id_category" value="<?=@$id?>">
                        <div class="mb-3" id="topup_circuit_fxd_div">
                            <label class="form-label">Category</label>
                            <input type="text" id="category" name="category"
                                class="form-control" value="<?= @$category ?>" required>
                        </div>
                        <div class="mb-5">
                            <button type="submit" id="btnconfirm"
                                class="btn btn-freedy-blue px-4 py-2 mx-auto shadow-none">Confirm</button>
                        </div>
                    </form>
                    <table id="tbl_history" class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="align-middle">
                                <th>No.</th>
                                <th>Category</th>
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