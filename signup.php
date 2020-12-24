<?php
require __DIR__ . '/is_admin.php';
require __DIR__ . '/db_connect.php';

$pageName = 'signup';

$stmt = $pdo->query("SELECT * FROM `activity`");

$sid = intval($_GET['sid']);

$row = $pdo
    ->query("SELECT * FROM `activity` WHERE sid=$sid")
    ->fetch();

$date = date("Y年m月d日 H點i分", strtotime($row['act_time']));

?>

<?php include __DIR__ . '/part/html_header.php'; ?>
<?php include __DIR__ . '/part/navbar.php'; ?>


<div class="container mb-5">

    <div class="alert alert-danger mt-5" role="alert" id="info" style="display: none;">
        錯誤
    </div>

    <div class="row justify-content-center">
        <div class="sign-box">
            <div class="sign-title">
                <p>報名</p>
            </div>
            <div class="login-form">
                <form name="signUpForm" method="POST" novalidate onsubmit="checkForm(); return false;">
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th class="m-top">
                                    <p>活動名稱</p>
                                </th>
                                <td class="m-top">
                                    <p><?= $row['name'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <label for="account">聯絡人姓名</label>
                                </th>
                                <td class="m-top">
                                    <div class="error-msg" style="display: none;">
                                        <p>請輸入正確的姓名</p>
                                    </div>
                                    <input type="text" name="name" id="name" class="inparea">
                                    <input type="text" name="act_name" value="<?= $row['name'] ?>" hidden>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <label for="gender">性別</label>
                                </th>
                                <td class="m-top">
                                    <input type="radio" name="gender" id="gender" value="男性">
                                    <label for="gender" class="sex">
                                        男性
                                    </label>
                                    <input type="radio" name="gender" id="gender" value="女性" class="gender">
                                    <label for="gender" class="sex">
                                        女性
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <label for="birth">出生年月日</label>
                                </th>
                                <td class="m-top">
                                    <input type="date" name="birth" id="birth" class="birth">
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <label for="mobile">手機</label>
                                </th>
                                <td class="m-top">
                                    <div class="error-msg" style="display: none;">
                                        <p>請輸入正確的手機號碼</p>
                                    </div>
                                    <input type="text" name="mobile" id="mobile" class="inparea">
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <label for="email">電子信箱</label>
                                </th>
                                <td class="m-top">
                                    <!-- <div class="error-msg" style="display: none;">
                                        <p>請輸入正確的電子郵件</p>
                                    </div> -->
                                    <input type="text" name="email" id="email" class="inparea" value="<?= $_SESSION['user']['email'] ?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">
                                    <label for="email">居住地區</label>
                                </th>
                                <td class="m-top">
                                    <select name="resident" id="resident" class="livecity">
                                        <option name="resident" value="">請選擇</option>
                                        <option name="resident" value="基隆市">基隆市</option>
                                        <option name="resident" value="台北市">台北市</option>
                                        <option name="resident" value="新北市">新北市</option>
                                        <option name="resident" value="桃園市">桃園市</option>
                                        <option name="resident" value="新竹市">新竹市</option>
                                        <option name="resident" value="新竹縣">新竹縣</option>
                                        <option name="resident" value="苗栗縣">苗栗縣</option>
                                        <option name="resident" value="台中市">台中市</option>
                                        <option name="resident" value="彰化縣">彰化縣</option>
                                        <option name="resident" value="南投縣">南投縣</option>
                                        <option name="resident" value="雲林縣">雲林縣</option>
                                        <option name="resident" value="嘉義市">嘉義市</option>
                                        <option name="resident" value="嘉義縣">嘉義縣</option>
                                        <option name="resident" value="台南市">台南市</option>
                                        <option name="resident" value="高雄市">高雄市</option>
                                        <option name="resident" value="屏東縣">屏東縣</option>
                                        <option name="resident" value="台東縣">台東縣</option>
                                        <option name="resident" value="花蓮縣">花蓮縣</option>
                                        <option name="resident" value="宜蘭縣">宜蘭縣</option>
                                        <option name="resident" value="澎湖縣">澎湖縣</option>
                                        <option name="resident" value="金門縣">金門縣</option>
                                        <option name="resident" value="連江縣">連江縣</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="m-top">

                                    <label for="times">報名時間</label>
                                </th>
                                <td class="m-top">
                                    <div class="error-msg" style="display: none;">
                                        <p>請選擇欲報名活動的時間</p>
                                    </div>
                                    <input type="radio" name="times" id="times" value="<?= $row['act_time'] ?>">
                                    <label for="times" class="sex">
                                        <?= $date ?>
                                    </label>
                                    <br>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <button type="submit" class="btn-submit">送出 Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/part/scripts.php'; ?>
<script>
    const info = document.querySelector('#info');
    const name = document.querySelector('#name');
    const mobile = document.querySelector('#mobile');
    // const email = document.querySelector('#email');
    const times = document.querySelector('#times');

    const mobile_re = /^09\d{8}$/;
    // const email_re = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;

    function checkForm() {
        let isPass = true;

        name.style.borderColor = '#9fa8a3';
        name.closest('.m-top').querySelector('.error-msg').style.display = 'none';
        mobile.style.borderColor = '#9fa8a3';
        mobile.closest('.m-top').querySelector('.error-msg').style.display = 'none';
        // email.style.borderColor = '#9fa8a3';
        // email.closest('.m-top').querySelector('.error-msg').style.display = 'none';

        if (name.value.length < 2) {
            isPass = false;
            name.style.borderColor = 'red';
            let errorMsg = name.closest('.m-top').querySelector('.error-msg');
            errorMsg.style.display = 'block';
        }

        if (!mobile_re.test(mobile.value)) {
            isPass = false;
            mobile.style.borderColor = 'red';
            let errorMsg = mobile.closest('.m-top').querySelector('.error-msg');
            errorMsg.style.display = 'block';
        }

        // if (!email_re.test(email.value)) {
        //     isPass = false;
        //     email.style.borderColor = 'red';
        //     let errorMsg = email.closest('.m-top').querySelector('.error-msg');
        //     errorMsg.style.display = 'block';
        // }

        if (!$('#times').prop('checked')) {
            isPass = false;
            let errorMsg = times.closest('.m-top').querySelector('.error-msg');
            errorMsg.style.display = 'block';
        }

        if (isPass) {
            const fd = new FormData(document.signUpForm);

            fetch('signup-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.json())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        // 新增成功
                        info.classList.remove('alert-danger');
                        info.classList.add('alert-success');
                        info.innerHTML = "報名成功";
                    } else {
                        // 新增失敗
                        info.classList.remove('alert-success');
                        info.classList.add('alert-danger');
                        info.innerHTML = "報名失敗";
                    }
                    info.style.display = 'block';
                });
        }
    }
</script>

<?php include __DIR__ . '/part/html_footer.php'; ?>