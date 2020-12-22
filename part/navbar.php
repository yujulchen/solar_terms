<?php
if (!isset($pageName)) $pageName = '';
?>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand brand-icon" href="#">HONKI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= WEB_ROOT ?>actindex.php">活動</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">查看報名</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= WEB_ROOT ?>login.php">登入</a>
            </li>
        </ul>
    </div>
</nav>