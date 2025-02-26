<?php

if(isset($_POST['acc']) && isset($_POST['pw']) && $_POST['acc'] == "admin" && $_POST['pw'] == "1234"){
    $_SESSION['admin'] = 1;
}

if(isset($_SESSION['admin'])){
    to("./admin.php");
}

?>
<div class="tab ct rb c">
    <h3 style="margin:4px">管理登入</h3>
</div>
<br>
<div class="tab clo ct">
    <form action="?do=login" method="post">
        <p>
            帳號：<input type="text" name="acc" id="">
        </p>
        <p>
            密碼：<input type="password" name="pw" id="">
        </p>
        <p>
            <input type="submit" value="登入">
            <input type="reset" value="清除">
        </p>
    </form>
</div>