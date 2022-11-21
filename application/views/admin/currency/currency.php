<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-12 card my-5">
                <div class="card-header fw-bold">
                    <i class="fas fa-money-bill me-1"></i>
                    Currency List
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-12">
                                <h4>Currency</h4>
                            </div>
                            <div class="col-12 px-5">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" role="switch" id="curr-1"
                                            checked disabled>
                                        <label class="form-check-label" for="curr-1">USD</label>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" role="switch" id="curr-16"
                                            checked disabled>
                                        <label class="form-check-label" for="curr-16">Euro</label>
                                    </div>
                                    <?php
                                    foreach ($currency as $dt) {
                                        if ($dt->currency != "USD" && $dt->currency != "EUR") {
                                    ?>
                                    <div class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="<?= $dt->currency ?>"
                                            <?php echo ($dt->status == 'active') ? "checked" : "" ?>
                                            onclick="enablecurrency('<?= $dt->currency ?>','<?php echo ($dt->status == 'active') ? "disabled" : "active" ?>')">
                                        <label class="form-check-label" for="<?= $dt->currency ?>">
                                            <?= $dt->name ?>
                                        </label>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>