<?php
$row=$Admin->find($_GET['id']);
$per=unserialize($row['per']);
?>
<h1 class="ct">修改管理員權限</h1>
<form action="./api/admin_save.php" method="post">
    <table width=100%>
        <tr>
            <td class="ct tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?=$row['acc'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw" value="<?=$row['pw'];?>"></td>
        </tr>
        <tr>
            <td class="ct tt">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="per[]" id="" value="1" <?=in_array(1,$per)?'checked':'';?>>商品分類與管理</div>
                <div><input type="checkbox" name="per[]" id="" value="2" <?=in_array(2,$per)?'checked':'';?>>訂單管理</div>
                <div><input type="checkbox" name="per[]" id="" value="3" <?=in_array(3,$per)?'checked':'';?>>會員管理</div>
                <div><input type="checkbox" name="per[]" id="" value="4" <?=in_array(4,$per)?'checked':'';?>>頁尾版權管理</div>
                <div><input type="checkbox" name="per[]" id="" value="5" <?=in_array(5,$per)?'checked':'';?>>最新消息管理</div>
            </td>
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        </tr>
    </table>
    <p class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
    </p>
</form>