<?php
require __DIR__ . '/is_admin.php';
require __DIR__ . '/db_connect.php';

if (isset($_GET['order_number'])) {
    $order_num = $_GET['order_number'];

    $pdo->query("DELETE FROM `sign_up` WHERE order_number = $order_num");
}

$backTo = 'review.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $backTo = $_SERVER['HTTP_REFERER'];
}

header('Location:  ' . $backTo);
