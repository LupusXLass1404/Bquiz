<form action="./api/insert.php?do=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <h2>新增動態文字廣告</h2>
    <hr>
    <div>
        <label for="text">動態文字廣告：</label>
        <input type="text" name="text" id="text">
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>