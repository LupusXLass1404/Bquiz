<?php 
    include_once "../api/db.php";
    $bottom=$Bottom->find(1);
?>

<h3 class="cent">頁尾版權資料管理</h3>
<hr>
<form action="api/update_bottom.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>頁尾版權資料：</td>
            <td><input type="text" name="bottom" id="text" value="<?=$bottom['text'];?>"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>