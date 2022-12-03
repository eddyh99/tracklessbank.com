<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="col-12 my-5">
                <a href="<?= base_url() ?>m3rc4n73/mwallet/withdraw"
                    class="btn btn-freedy-blue fw-bold px-5 py-3">Withdraw</a>
            </div>
            <div class="col-12 card mb-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Transactions
                </div>
                <div class="card-body">
                    <input class="datepicker-af" type="text" name="tgl" id="tgl" readonly>
                    <table class="table table-hover table-bordered" id="tbl_history">
                        <thead class="table-dark">
                            <tr class="align-middle">
                                <th>No.</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Cost</th>
                                <th>Comission</th>
                                <th>Date</th>
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