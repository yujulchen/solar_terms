<?php
if (!isset($_SESSION)) {
    session_start();
}

$title = '登入';

if (isset($_POST['account']) and isset($_POST['password'])) {
    if ($_POST['account'] === 'abc123' and $_POST['password'] === '1234') {
        // 可以登入
        $_SESSION['user'] = 'abc123';
    } else {
        $errorMsg = '帳號或密碼錯誤';
    }
}
?>

<?php include __DIR__ . '/part/html_header.php'; ?>
<?php include __DIR__ . '/part/navbar.php'; ?>

<div class="container">
    <?php if (isset($errorMsg)) : ?>
        <div class="alert alert-danger mt-5 login-title" role="alert">
            <?= $errorMsg ?>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION['user'])) : ?>
        <div class="login-page">
            <h3>Hello <?= $_SESSION['user'] ?> </h3>
            <br>
            <a href="logout.php">
                <div class="logout-btn btn-submit">登出</div>
            </a>
        </div>
    <?php else : ?>
        <div class="row justify-content-center">
            <div class="login-box">
                <div class="login-title">
                    <p>登入</p>
                </div>
                <div class="login-form">
                    <form method="POST">
                        <div class="form-group">
                            <label for="account">帳號 Account</label>
                            <br>
                            <input type="text" name="account" id="account" class="input-box" value="<?= htmlentities($_POST['account'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">密碼 Password</label>
                            <br>
                            <input type="password" name="password" id="password" class="input-box" value="<?= htmlentities($_POST['password'] ?? '') ?>">
                        </div>
                        <button type="submit" class="btn-submit">送出 Submit</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>



<?php include __DIR__ . '/part/scripts.php'; ?>
<?php include __DIR__ . '/part/html_footer.php'; ?>