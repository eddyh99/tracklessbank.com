<div class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
    <input class="form-check-input" type="checkbox" role="switch" id="curr-1" checked disabled>
    <label class="form-check-label" for="curr-1">USD</label>
</div>
<div class="col-12 col-sm-6 col-md-4 form-check form-switch form-check-inline">
    <input class="form-check-input" type="checkbox" role="switch" id="curr-16" checked disabled>
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