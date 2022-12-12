<input type="hidden" name="url" value="<?= $type ?>">
<div class="mb-3">
    <input class="form-control" type="text" name="amount" placeholder="Amount">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="accountHolderName" placeholder="Recipient Name">
</div>

<?php if ($type == 'local') { ?>
<div class="mb-3">
    <input class="form-control" type="text" name="IBAN" placeholder="IBAN">
</div>
<?php } ?>

<?php if ($type == 'inter') { ?>
<div class="mb-3">
    <input class="form-control" type="text" name="accountNumber" placeholder="Account Number">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="swiftCode" placeholder="Swift Code">
</div>
<?php } ?>
<div class="mb-3">
    <input class="form-control" type="text" name="causal" placeholder="Causal">
</div>