<input type="hidden" name="url" value="<?= $type ?>">
<div class="mb-3">
    <input class="form-control" type="text" name="amount" placeholder="Amount">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="accountHolderName" placeholder="Recipient Name">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="accountNumber" placeholder="Account Number" maxlength="18"
        minlength="18">
</div>
<div class="mb-3">
    <select name="accountType" class="form-select" id="accountType">
        <option value="SAVING">Saving</option>
        <option value="CHECKING">Checking</option>
    </select>
</div>
<div class="mb-3">
    <select name="bankCode" class="form-select" id="bankCode">
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="rut" placeholder="Rut">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="phoneNumber" placeholder="Phone Number">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="causal" placeholder="Causal">
</div>