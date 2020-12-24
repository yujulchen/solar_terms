<?php

require __DIR__ . '/db_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
    'post' => $_POST,
];

if (!isset($_POST['order_number']) or !isset($_POST['name']) or !isset($_POST['mobile'])) {
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 產生隨機流水號
$order_sn = date('ymd') . substr(time(), -5) . substr(microtime(), 2, 5);
// echo $order_sn;

$sql = "UPDATE `sign_up` SET `name`=?,`gender`=?,`birth`=?,`mobile`=?,`resident`=?,`times`=? WHERE `order_number`=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['name'],
    $_POST['gender'],
    empty($_POST['birth']) ? NULL : $_POST['birth'],
    $_POST['mobile'],
    $_POST['resident'],
    $_POST['times'],
    $_POST['order_number']
]);

$output['rowCount'] = $stmt->rowCount();
if ($stmt->rowCount()) {
    $output['success'] = true;
    unset($output['error']);
} else {
    $output['error'] = '資料沒有修改';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
