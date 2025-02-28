<?php
if(isset($_POST['acc']) && $_POST['acc'] == 'admin' && isset($_POST['pw']) && $_POST['pw'] == '1234'){
    $_SESSION['login'] = $_POST['acc'];
}

if(isset($_SESSION['login'])){
    to('./admin.php');
}
?>

<form action="?do=login" method="post" class="tab ct rb">
    <h2 class="ct rb">管理登入</h2>
    <p>帳號：<input type="text" name="acc" id="acc"></p>
    <p>密碼：<input type="password" name="pw" id="pw"></p>
    <p class="ct">
        <input type="submit" value="登入">
        <input type="reset" value="清除">
    </p>
</form>