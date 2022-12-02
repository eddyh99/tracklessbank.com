<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name(); ?>"
    value="<?php echo $this->security->get_csrf_hash(); ?>">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card mb-5 mt-3">
                <div class="card-header fw-bold">
                    Wise Cost
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="currency_wcost" class="col-sm-2 col-form-label">Currency</label>
                        <div class="col-sm-10">
                            <select name="currency" id="currency_wcost" class="form-select">
                                <option value="">-Select Currency-</option>
                                <?php foreach ($currency as $dt) { ?>
                                <option value="<?= $dt->currency ?>"><?= $dt->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Circuit</label>
                        <input type="text" id="circuit" name="circuit" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Outside</label>
                        <input type="text" id="outside" name="outside" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>