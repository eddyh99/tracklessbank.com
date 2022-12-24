<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card my-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-list me-1"></i>
                    Transactions
                </div>
                <div class="card-body">
                    <input class="datepicker-af" type="text" name="tgl" id="tgl" readonly>
                    <table class="table table-hover table-bordered" id="tbl_history_member">
                        <thead class="table-dark">
                            <tr class="align-middle">
                                <th>Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Fee</th>
                                <th>Balance</th>
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