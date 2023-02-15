<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="swiftCode" class="form-control me-2">
        <option value="">--Bank Code (BIC/SWIFT)--</option>
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>