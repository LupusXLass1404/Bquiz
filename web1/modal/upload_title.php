<form action="./api/insert.php?do=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <h2>更新標題區圖片</h2>
    <hr>
    <div>
        <label for="img">標題區圖片：</label>
        <input type="file" name="img" id="img">
    </div>
    <div>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>