<?php

define('WP_USE_THEMES', false);
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

$id = $_GET['id'];
$key = $_GET['key'];

if ($key !== SECRET_KEY_FOR_HTTP_REQUESTS) {
    header('HTTP/1.1 404 Not Found');
    die();
}

if (isset($id)) {
     $order = wc_get_order($id);
     $clientEmail = $order->get_billing_email();

    if ($order) {
        sendCancelledOrderNotificationEmail($id);
        sendCancelledOrderNotificationEmail($id, $clientEmail);
    } else {
        header('HTTP/1.1 404 Not Found');
        die();
    }
} else {
    header('HTTP/1.1 404 Not Found');
    die();
}

