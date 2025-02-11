<form action="./api/insert.php?do=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <h2 class="cent">新增主選單</h2>
    <hr>
    <div>
        <label for="text">主選單：</label>
        <input type="text" name="text" id="text">
    </div>
    <div>
        <label for="url">主選連結網址：</label>
        <input type="text" name="url" id="url">
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>