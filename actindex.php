<?php
require __DIR__ . '/db_connect.php';

$stmt = $pdo->query("SELECT * FROM activity");

// echo json_encode($row, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

?>

<?php include __DIR__ . '/part/html_header.php'; ?>
<?php include __DIR__ . '/part/navbar.php'; ?>

<div class="container mb-3">
    <div class="row">
        <div class="tags d-flex">
            <a href="#">
                <div>活動地區</div>
            </a>
            <a href="#">
                <div>講座</div>
            </a>
            <a href="#">
                <div>讀書會</div>
            </a>
            <a href="#">
                <div>休閒活動</div>
            </a>
            <a href="#">
                <div>戶外探索</div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="card_gallory d-flex flex-wrap">
            <?php while ($r = $stmt->fetch()) : ?>
                <a href="activitypage.php?sid=<?= $r['sid'] ?>" class="card_box">
                    <div class="card_img">
                        <img src="img/<?= $r['pic'] ?>">
                    </div>
                    <div class="card_text">
                        <div class="card_title">
                            <?= $r['name'] ?>
                        </div>
                        <div class="card_depiction">
                            <p class="mt-2"> &diams;活動地點</p>
                            <p class="ml-3"><?= $r['act_location'] ?></p>
                            <p class="mt-1"> &diams;活動時間</p>
                            <p class="ml-3"><?= $date = date("Y年m月d日 H點i分", strtotime($r['act_time'])); ?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/part/scripts.php'; ?>
<?php include __DIR__ . '/part/html_footer.php'; ?>