<?php
 
require_once('WebToPay.php');
 
function get_self_url() {
    $s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0, strpos($_SERVER['SERVER_PROTOCOL'], '/'));
 
    if (count($_SERVER['HTTPS']) > 0) {
        $s .= ($_SERVER['HTTPS'] === 'on') ? 's' : '';
    }
 
    $s .= '://' . $_SERVER['HTTP_HOST'];
 
    if (count($_SERVER['SERVER_PORT']) > 0 && $_SERVER['SERVER_PORT'] !== '80') {
        $s .= ':' . $_SERVER['SERVER_PORT'];
    }
 
    $s .= dirname($_SERVER['SCRIPT_NAME']);
 
    return $s;
}
 
try {
    $self_url = get_self_url();
 
    $request = WebToPay::redirectToPayment([
        'projectid' => 0,
        'sign_password' => 'd41d8cd98f00b204e9800998ecf8427e',
        'orderid' => 0,
        'amount' => 1000,
        'currency' => 'EUR',
        'country' => 'LT',
        'accepturl' => $self_url . '/accept.php',
        'cancelurl' => $self_url . '/cancel.php',
        'callbackurl' => $self_url . '/callback.php',
        'test' => 0,
    ]);
} catch (WebToPayException $e) {
    // handle exception
}
