<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>

<?php if ($type == "local") { ?>
<div class="d-flex flex-row align-items-center my-3">
    <select name="accountType" class="form-control me-2" id="accountType">
        <option value="saving">Saving</option>
        <option value="checking">Checking</option>
    </select>
</div>
<?php } ?>

<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="city" placeholder="City">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="postCode" placeholder="Postcode">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="firstLine" placeholder="FirstLine">
</div>
<?php if ($type == "local") { ?>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="state" placeholder="State initial" maxlength="2">
</div>
<?php } ?>

<?php if ($type == "inter") { ?>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="state" placeholder="State">
</div>
<?php } ?>

<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="countryCode" placeholder="Country initial" maxlength="2">
</div>

<?php if ($type == "local") { ?>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="abartn" placeholder="Abartn">
</div>
<?php } ?>

<?php if ($type == "inter") { ?>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="swiftCode" placeholder="Swift Code">
</div>

<input type="hidden" name="abartn" value="">
<input type="hidden" name="accountType" value="">
<?php } ?>