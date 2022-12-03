<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php $this->load->view("admin/header"); ?>
            <div class="col-12 card mb-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Transactions
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-auto">
                            <input class="datepicker-af" type="text" name="tgl" id="tgl" readonly>
                        </div>
                        <div class="col-auto">
                            <select name="bank" id="bank" class="form-select my-3">
                                <?php foreach ($bank as $dt) { ?>
                                <option value="<?= $dt->id ?>"><?= $dt->bank_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <table id="tbl_history" class="table table-hover table-bordered">
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