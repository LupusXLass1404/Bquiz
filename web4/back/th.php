<a href="?do=th">商品分類</a>／<a href="?do=good">商品管理</a>
<h1>商品分類</h1>
<form action="./api/class.php" method="post">
    新增大分類：<input type="text" name="text"><input type="submit" value="新增">
</form>
<form action="./api/class.php" method="post">
    新增中分類：
    <select name="main_id" id="main_id">
        <?php foreach($Class->all(['main_id'=>0]) as $row): ?>
            <option value="<?=$row['id'];?>"><?=$row['text'];?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="text"><input type="submit" value="新增">
</form>
<form action="./api/class_edit.php?do=th&db=Class" method="post">
    <?php foreach($Class->all(['main_id'=>0]) as $row): ?>
        <div class="tt" style="padding:4px 8px;">
            <b>大分類：<input type="text" name="text[]" value="<?=$row['text'];?>"></b> | 
            刪除<input type="checkbox" name="del[]" value="<?=$row['id'];?>">
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </div>
        <?php foreach($Class->all(['main_id'=>$row['id']]) as $row): ?>
            <div class="pp" style="padding-left:40px;">
                中分類：<input type="text" name="text[]" value="<?=$row['text'];?>"> | 
                刪除<input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
    </div>
</form>
