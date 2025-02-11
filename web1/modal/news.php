<form action="./api/insert.php?do=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <h2 class="cent">新增最新消息資料</h2>
    <hr>
    <div>
        <label for="text">最新消息資料：</label>
        <textarea name="text" id="text"></textarea>
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>