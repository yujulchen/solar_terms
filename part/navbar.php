<?php
if (!isset($pageName)) $pageName = '';
?>

<style>
    .navbar .nav-item .active {
        background-color: #B3D9D9;
        border-radius: 5px;
        box-shadow: 0px 1px 0px #003E3E;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand brand-icon" href="<?= WEB_ROOT ?>actindex.php">HONKI</a>
    <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $pageName == 'actindex' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= WEB_ROOT ?>actindex.php">活動</a>
            </li>
            <li class="nav-item <?= $pageName == 'review' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= WEB_ROOT ?>review.php">查看報名</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?= $_SESSION['user']['email'] ?></a>
                </li>
                <li class="nav-item <?= $pageName == 'logout' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= WEB_ROOT ?>logout.php">登出</a>
                </li>
            <?php else : ?>
                <li class="nav-item <?= $pageName == 'login' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= WEB_ROOT ?>login.php">登入</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>