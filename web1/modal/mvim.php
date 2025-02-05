<form action="./api/insert.php?do=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <h2 class="cent">新增動畫圖片</h2>
    <hr>
    <div>
        <label for="img">動畫圖片：</label>
        <input type="file" name="img" id="img">
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>