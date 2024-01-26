<div class="mb-3">
    <input class="form-control" type="text" name="accountNumber" placeholder="Account Number">
</div>
<?php if ($type == "local") { ?>
<div class="mb-3">
    <input class="form-control" type="text" name="abartn" placeholder="Routing Number">
</div>
<?php } ?>

<?php if ($type == "inter") { ?>
<div class="mb-3">
    <input class="form-control" type="text" name="swiftCode" placeholder="Swift Code">
</div>

<input type="hidden" name="abartn" value="">
<input type="hidden" name="accountType" value="">
<?php } ?>

<?php if ($type == "local") { ?>
<div class="mb-3">
    <select name="accountType" class="form-select" id="accountType">
        <option value="savings">Saving</option>
        <option value="checking">Checking</option>
    </select>
</div>
<?php } ?>

<div class="mb-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control" type="text" name="city" placeholder="City"
        <?php if ($type == 'local') echo 'value="Delaware"'; ?>>
</div>
<div class="mb-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control" type="text" name="postCode" placeholder="Postcode"
        <?php if ($type == 'local') echo 'value="19958"'; ?>>
</div>
<div class="mb-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control" type="text" name="firstLine" placeholder="FirstLine"
        <?php if ($type == 'local') echo 'value="16192 Coastal Highway"'; ?>>
</div>
<?php if ($type == "local") { ?>
<div class="mb-3 <?php if ($type == 'local') echo 'd-none'; ?>">
    <input class="form-control" type="text" name="state" placeholder="State initial" maxlength="2"
        <?php if ($type == 'local') echo 'value="DE"'; ?>>
    <input class="form-control" type="text" name="state" placeholder="countryCode"
        <?php if ($type == 'local') echo 'value="US"'; ?>>
</div>
<?php } ?>

<?php if ($type == "inter") { ?>
<div class="mb-3">
    <input class="form-control" type="text" name="state" placeholder="State">
</div>

<div class="mb-3">
    <select name="countryCode" class="form-select me-2" id="countryCode">
        <option value="">--Country Initial--</option>
        <?php foreach ($countries_list as $cur) { ?>
        <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
</div>

<?php } ?>