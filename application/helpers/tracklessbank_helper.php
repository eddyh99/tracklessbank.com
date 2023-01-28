<?php
function apitrackless($url, $postData = NULL)
{
    $token = "pPaqjxUmeiwXb9aqfWVREKvNzKOUh5ei5DQPHXCMkIluGCwkXu";

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
        URLAPI . "/v1/member/wallet/getBalance?currency=" . $currency . "&userid=" . $userid
    )->message->balance;
    return $balance;
}

function balanceadmin($currency)
{
    $balance = apitrackless(
        URLAPI . "/v1/trackless/wallet/balance_ByCurrency?currency=" . $currency)->message->balance;
    return $balance;
}

function mail_formbank($php_mailer, $email, $message)
{
    $mail = $php_mailer;

    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;
    $mail->SMTPAutoTLS  = false;
    $mail->SMTPSecure   = false;
    $mail->Port         = 587;

    $mail->setFrom(USERNAME_EMAIL, 'TracklessBank');
    $mail->addReplyTo($email);
    $mail->isHTML(true);

    $mail->ClearAllRecipients();

    $mail->Subject = "About Trackless Bank";
    $mail->AddAddress('m3rc4n73@gmail.com');
    $mail->AddAddress('roberto-info@tracklessmail.com');

    $mail->msgHTML($message);
    $mail->send();
}

function mail_auth($php_mailer, $email, $subject, $message)
{
    $mail = $php_mailer;

    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;
    $mail->SMTPAutoTLS    = false;
    $mail->SMTPSecure    = false;
    $mail->Port            = 587;

    $mail->setFrom(USERNAME_EMAIL, 'TracklessBank');
    $mail->isHTML(true);

    $mail->ClearAllRecipients();


    $mail->Subject = $subject;
    $mail->AddAddress($email);

    $mail->msgHTML($message);
    $mail->send();
}

function mail_cost($php_mailer, $email, $subject, $message)
{
    $mail = $php_mailer;

    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;
    // $mail->SMTPDebug    = 2;
    $mail->SMTPAutoTLS    = true;
    $mail->SMTPSecure    = "tls";
    $mail->Port            = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom(USERNAME_EMAIL, 'TracklessBank');
    $mail->isHTML(true);

    $mail->ClearAllRecipients();

    $mail->Subject = $subject;
    $mail->AddAddress($email);

    $mail->msgHTML($message);
    $mail->send();
}

function mail_member($php_mailer, $email, $subject, $message)
{
    $mail = $php_mailer;

    $mail->isSMTP();
    $mail->Host         = HOST_EMAIL;
    $mail->SMTPAuth     = true;
    $mail->Username     = USERNAME_EMAIL;
    $mail->Password     = PASS_EMAIL;
    $mail->SMTPAutoTLS    = false;
    $mail->SMTPSecure    = false;
    $mail->Port            = 587;

    $mail->setFrom(USERNAME_EMAIL, 'TracklessBank');
    $mail->isHTML(true);

    $mail->ClearAllRecipients();

    $mail->Subject = $subject;
    foreach ($email as $dt) {
        $mail->AddAddress($dt);
    }

    $mail->msgHTML($message);
    $mail->send();
}