<h1>編輯會員資料</h1>
<?php $row=$Mem->find($_GET['id']);?>
<form action="./api/mem_edit.php" method="post">
    <p>帳號：<?=$row['acc'];?></p>
    <p>密碼：<?=str_repeat("*", mb_strlen($row['pw']));?></p>
    <p>姓名：<input type="text" name="name" value="<?=$row['name'];?>"></p>
    <p>電子信箱：<input type="text" name="email" value="<?=$row['email'];?>"></p>
    <p>地址：<input type="text" name="address" value="<?=$row['address'];?>"></p>
    <p>電話：<input type="text" name="tel" value="<?=$row['tel'];?>"></p>
    <p>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="lof('?do=mem')">
    </p>
</form>