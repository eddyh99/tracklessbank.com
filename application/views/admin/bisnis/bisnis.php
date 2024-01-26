<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card mb-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Registered Business
                </div>
                <div class="card-body">
                    <table id="tbl_history" class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="align-middle">
                                <th>No.</th>
                                <th>Ucode</th>
                                <th>Business Name</th>
                                <th style="width:200px">Google Map</th>
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