<?php

require __DIR__ . '/db_connect.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '參數不足',
    'post' => $_POST,
];

if (!isset($_POST['name']) or !isset($_POST['mobile'])) {
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// $email_re = "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/";
// if (!preg_match($email_re, $_POST['email'])) {
//     $output['code'] = 400;
//     $output['error'] = 'Email 格式錯誤';

//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }


// 產生隨機流水號
$order_sn = date('ymd') . substr(time(), -5) . substr(microtime(), 2, 5);
// echo $order_sn;

$sql = "INSERT INTO `sign_up`(
    `order_number`, `act_name`, `name`, `gender`, `birth`, `email`, `resident`, `times`, `created_at`
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, NOW()
    )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $order_sn,
    $_POST['act_name'],
    $_POST['name'],
    $_POST['gender'],
    empty($_POST['birth']) ? NULL : $_POST['birth'],
    $_SESSION['user']['email'],
    $_POST['resident'],
    $_POST['times'],
]);

$output['rowCount'] = $stmt->rowCount();
if ($stmt->rowCount()) {
    $output['success'] = true;
    unset($output['error']);
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
