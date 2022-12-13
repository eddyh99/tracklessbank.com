<input type="hidden" name="url" value="<?= $type ?>">
<div class="mb-3">
    <input class="form-control" type="text" name="amount" placeholder="Amount">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="accountHolderName" placeholder="Recipient Name">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="IBAN" placeholder="IBAN">
</div>
<div class="mb-3">
    <select name="bankCode" class="form-select" id="bankCode">
        <?php foreach ($codecur as $dt) { ?>
        <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
        <?php } ?>
    </select>
</div>
<div class="mb-3">
    <select name="branchCode" class="form-select" id="branchCode">
    </select>
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="countryCode" placeholder="Country initial" maxlength="2">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="city" placeholder="City">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="firstLine" placeholder="FirstLine">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="postCode" placeholder="Post Code">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="causal" placeholder="Causal">
</div>