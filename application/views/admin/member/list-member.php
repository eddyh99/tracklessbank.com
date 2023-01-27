<?php 
$email = array();
foreach ($member as $dt) { 
    if(!in_array($dt->email, $email)){
        $email[] = $dt->email;
?>
<option value="<?= $dt->email ?>"><?= $dt->email ?></option>
<?php 
    } 
} 
?>