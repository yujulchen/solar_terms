<?php
require __DIR__ . '/db_connect.php';
// if (!isset($_SESSION)) {
//     session_start();
// }

$title = '登入';
$pageName = 'login';

if (isset($_POST['email']) and isset($_POST['password'])) {
    $sql = "SELECT * FROM `user` WHERE email=? and password=? ";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['email'],
        $_POST['password']
    ]);

    $row = $stmt->fetch();

    if (empty($row)) {
        $errorMsg = '帳號或密碼錯誤';
    } else {
        $_SESSION['user'] = $row;
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
            <h3>Hello</h3>
            <br>
            <h2><?= $_SESSION['user']['nickname'] ?></h2>
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
                            <label for="email">電子信箱 Email</label>
                            <br>
                            <input type="text" name="email" id="email" class="input-box" value="<?= htmlentities($_POST['email'] ?? '') ?>">
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