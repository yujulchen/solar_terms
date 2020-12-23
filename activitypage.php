<?php
require __DIR__ . '/db_connect.php';

$stmt = $pdo->query("SELECT * FROM `activity`");

// if (!isset($_GET['sid'])) {
//     header('Location: actindex.php');
//     exit;
// }

$sid = intval($_GET['sid']);

$row = $pdo
    ->query("SELECT * FROM `activity` WHERE sid=$sid")
    ->fetch();


$date = date("Y年m月d日 H點i分", strtotime($row['act_time']));


// if (empty($row)) {
//     header('Location: activitypage.php');
//     exit;
// }

// $row = $stmt->fetchAll();

?>

<?php include __DIR__ . '/part/html_header.php'; ?>
<?php include __DIR__ . '/part/navbar.php'; ?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="actindex.php">活動</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $row['name'] ?></li>
        </ol>
    </nav>
    <div class="row position-relative">
        <div class="tags tags-m d-flex mr-auto">
            <a href="#act-about">
                <div>體驗介紹</div>
            </a>
            <a href="#cancel-or-change">
                <div>取消與更改</div>
            </a>
        </div>

        <a href="signup.php?sid=<?= $row['sid'] ?>" class="sign-up-link">
            <div class="sign-up sign-up-m d-flex">
                <div>報<br>名</div>
            </div>
        </a>


    </div>

    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/<?= $row['pic'] ?>" class="d-block w-100" alt="read1">
                </div>
                <div class="carousel-item">
                    <img src="img/pexels-kaboompics-com-5834.jpg" class="d-block w-100" alt="read2">
                </div>
                <div class="carousel-item">
                    <img src="img/pexels-aline-viana-prado-2465877.jpg" class="d-block w-100" alt="read3">
                </div>
                <div class="carousel-item">
                    <img src="img/pexels-rodnae-productions-6115931.jpg" class="d-block w-100" alt="read4">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="textbox">
        <div class="act-title">
            <div class="act-title-box">
                <p>
                    <?= $row['name'] ?>
                </p>
            </div>
        </div>
    </div>

    <div id="act-about" class="act-about-box">
        <p class="act-about-title"> &diams;活動介紹</p>
        <p class="act-about-text">
            <?= $row['about_act'] ?>
        </p>
    </div>
    <div class="act-about-box">
        <p class="act-about-title"> &diams;活動時間</p>
        <p class="act-about-text">
            <?= $date ?>
        </p>
    </div>
    <div class="act-about-box">
        <p class="act-about-title"> &diams;活動地點</p>
        <p class="act-about-text">
            <?= $row['act_location'] ?>
        </p>
    </div>
    <div class="act-about-box">
        <p class="act-about-title"> &diams;交通方式</p>
        <p class="act-about-text">
            <?= $row['transportation'] ?>
        </p>
    </div>
    <div class="act-about-box">
        <p class="act-about-title"> &diams;活動對象</p>
        <p class="act-about-text">
            <?= $row['participant'] ?>
        </p>
    </div>
    <div class="act-about-box">
        <p class="act-about-title"> &diams;注意事項</p>
        <p class="act-about-text">
            <?= $row['notice'] ?>
        </p>
    </div>
    <div class="act-about-box">
        <p class="act-about-title"> &diams;活動成行</p>
        <p class="act-about-text">
            <?= $row['requirement'] ?>
        </p>
    </div>
    <div class="act-about-box">
        <p class="act-about-title"> &diams;活動主辦</p>
        <p class="act-about-text">
            <?= $row['organizer'] ?>
        </p>
    </div>
    <div id="cancel-or-change" class="act-about-box mb-5">
        <p class="act-about-title"> &diams;取消與更改</p>
        <p class="act-about-text">
            <?= $row['cancel_or_change'] ?>
        </p>
    </div>
</div>



<div class="btt-btn">
    <a href="#" class="btt-link">
        <div class="btt-icon">
            <i class="fas fa-angle-up"></i>
        </div>
    </a>
</div>

<?php include __DIR__ . '/part/scripts.php'; ?>
<?php include __DIR__ . '/part/html_footer.php'; ?>