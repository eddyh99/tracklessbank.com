<?php
foreach ($bankCode as $dt) { ?>
    <option value="<?= $dt->code ?>"><?= $dt->title ?></option>
<?php } ?>