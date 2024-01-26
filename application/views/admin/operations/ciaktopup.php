<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-6 card my-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-money-bill me-1"></i>
                    Topup Ciak Process
                </div>
                <div class="card-body">
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
                    <form action="<?=base_url()?>m3rc4n73/operations/ciakimport" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                            value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Import Excel File</label>
                            <input class="form-control" type="file" name="topup" id="topup">
                        </div>
                        <button class="btn btn-freedy-blue px-4 py-2 shadow-none">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>