<?php
function apitrackless($url, $postData = NULL)
{
    $token = "MgX7HTkke3KK70uVEwEc304ijKVcyoaaA4mjoFMT6Au3zXgoQM";

    $ch     = curl_init($url);
    $headers    = array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $result;
}

function balance($userid, $currency)
{
    $balance = apitrackless(
        "https://api.tracklessbank.com/v1/member/wallet/getBalance?currency=" . $currency . "&userid=" . $userid
    )->message->balance;
    return $balance;
}

function balanceadmin($currency)
{
    $balance = apitrackless(
        "https://api.tracklessbank.com/v1/admin/wallet/balance_ByCurrency?currency=" . $currency
    )->message->balance;
    return $balance;
}