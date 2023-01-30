<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="accountNumber" placeholder="Account Number">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="legalType" class="form-control me-2" id="accountType">
        <option value="PRIVATE">Personal</option>
        <option value="BUSINESS">Business</option>
    </select>
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="type" class="form-control me-2" id="accountType">
        <option value="chinese_alipay">Alipay</option>
        <option value="chinese_wechatpay">Wechat</option>
    </select>
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="swiftCode" placeholder="Swift Code">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="city" placeholder="City">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <select name="country" class="form-select me-2" id="country">
        <option value="">--Country Initial--</option>
        <?php foreach ($countries_list as $cur) { ?>
        <option value="<?= $cur['code'] ?>"><?= $cur['code'] . ' - ' . $cur['name'] ?></option>
        <?php } ?>
    </select>
    <!-- <input class="form-control me-2" type="text" name="country" placeholder="country initial" maxlength="2"> -->
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="firstLine" placeholder="FirstLine">
</div>
<div class="d-flex flex-row align-items-center my-3">
    <input class="form-control me-2" type="text" name="postCode" placeholder="Post Code">
</div>