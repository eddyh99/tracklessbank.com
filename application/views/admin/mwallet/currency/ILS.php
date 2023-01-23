<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="IBAN" placeholder="IBAN">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="bankCode" class="form-control me-2" id="bankCode">
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="branchCode" class="form-control me-2" id="branchCode">
    </select>
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="countryCode" placeholder="Country initial" maxlength="2">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="city" placeholder="City">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="firstLine" placeholder="FirstLine">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="postCode" placeholder="Post Code">
</div>