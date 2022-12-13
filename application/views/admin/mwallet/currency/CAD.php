<input type="hidden" name="url" value="<?= $type ?>">
<div class="mb-3">
    <input class="form-control" type="text" name="amount" placeholder="Amount">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="accountHolderName" placeholder="Recipient Name">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="accountNumber" placeholder="Account Number">
</div>
<div class="mb-3">
    <select name="accountType" class="form-select" id="accountType">
        <option value="saving">Saving</option>
        <option value="checking">Checking</option>
    </select>
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="institutionNumber" placeholder="Institution Number">
</div>
<div class="mb-3">
    <input class="form-control" type="text" name="transitNumber" placeholder="Transit Number">
</div>

<div class="mb-3">
    <input class="form-control" type="text" name="causal" placeholder="Causal">
</div>