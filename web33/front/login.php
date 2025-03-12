<?php
if(isset($_POST['acc'])&&$_POST['acc']=='admin'&&isset($_POST['pw'])&&$_POST['pw']=='1234') $_SESSION['admin']=1;
if(isset($_SESSION['admin'])) to('./admin.php');
?>

<div class="ct">
    <h2>管理登入</h2>
    <form action="?do=login" method="post">
        <p>帳號：<input type="text" name="acc" id="acc"></p>
        <p>密碼：<input type="password" name="pw" id="pw"></p>
        <p>
            <input type="submit" value="登入">
            <input type="reset" value="重置">
        </p>
    </form>
</div>