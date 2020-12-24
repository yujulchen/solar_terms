<?php
require __DIR__ . '/is_admin.php';
require __DIR__ . '/db_connect.php';

$pageName = 'review';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user']['email'];
$stmt = $pdo->query("SELECT * 
FROM `sign_up` s
JOIN `user` u ON s.`email` = u.`email`
WHERE u.`email`= '$user';");

$row = $stmt->fetchAll();

// $sid = intval($_GET['sid']);

// $row = $pdo
//     ->query("SELECT * FROM `sign_up` WHERE sid=$sid")
//     ->fetch();

?>

<?php include __DIR__ . '/part/html_header.php'; ?>
<?php include __DIR__ . '/part/navbar.php'; ?>

<div class="container mb-3">
    <div class="row">
        <?php foreach ($row as $r) : ?>
            <div class="formreview">
                <div class="success d-flex justify-content-center">
                    <i class="fas fa-check-circle"></i>
                </div>

                <div class="review-i">
                    <div class="ordernum">
                        <p>#報名單號&ensp;<?= $r['order_number'] ?></p>
                    </div>
                    <div class="review-title">
                        <p><?= $r['act_name'] ?></p>
                    </div>
                </div>

                <div class="review-box">
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th class="m-top">
                                    <p>聯絡人姓名</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $r['name'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <p>性別</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $r['gender'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <p>出生年月日</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $r['birth'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <p>手機</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $r['mobile'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <p>電子信箱</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $r['email'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <p>居住地區</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $r['resident'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <p>報名時間</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $r['times'] ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="edit">
                        <a href="edit.php?order_number=<?= $r['order_number'] ?>" class="btn btn-info mb-2">編輯</a>
                    </div>
                    <div class="delete ml-2">
                        <!-- <a href="javascript:" onclick="removeItem(event)"> -->
                        <a href="delete-api.php?order_number=<?= $r['order_number'] ?>" onclick="del_it(event, <?= $r['order_number'] ?>)">
                            <button type="submit" class="btn btn-danger mb-2">刪除</button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>


    <?php include __DIR__ . '/part/scripts.php'; ?>
    <script>
        function del_it(event, order_number) {
            if (!confirm(`是否要刪除編號為${order_number} 的報名？`)) {
                event.preventDefault();
            }
        }
    </script>

    <?php include __DIR__ . '/part/html_footer.php'; ?>