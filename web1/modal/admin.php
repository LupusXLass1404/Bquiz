<form action="./api/insert.php?do=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <h2 class="cent">新增管理者帳號</h2>
    <hr>
    <div>
        <label for="acc">帳號：</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="pw">密碼：</label>
        <input type="password" name="pw" id="pw">
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>