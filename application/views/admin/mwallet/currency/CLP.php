<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number" maxlength="18"
        minlength="18">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="accountType" class="form-control me-2" id="accountType">
        <option value="">--Account Type--</option>
        <option value="SAVING">Saving</option>
        <option value="CHECKING">Checking</option>
    </select>
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="bankCode" class="form-control me-2" id="bankCode">
        <option value="">--Bank Code--</option>
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="rut" placeholder="Rut">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="phoneNumber" placeholder="Phone Number">
</div>