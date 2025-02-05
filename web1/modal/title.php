<form action="./api/insert.php?do=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <h2 class="cent">新增標題區圖片</h2>
    <hr>
    <div>
        <label for="img">標題區圖片：</label>
        <input type="file" name="img" id="img">
    </div>
    <div>
        <label for="text">標題區替代文字：</label>
        <input type="text" name="text" id="text">
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>