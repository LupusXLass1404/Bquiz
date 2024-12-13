<?php 
    include_once '../api/db.php';
    $rows=$Menu->all(['main_id'=>$_GET['id']]); 
?>

<h3 class="cent">修改次選單</h3>
<hr>
<form action="api/submenu.php" method="post" enctype="multipart/form-data">
    <table id="menu" style="margin: auto;">
        <tr>
            <td>次選單名稱</td>
            <td>選單網址連結</td>
            <td>刪除</td>
        </tr>
        <?php
            foreach($rows as $row){ 
        ?>
        <tr>
            <td><input type="text" name="text[]" id="text" value="<?=$row['text']?>"></td>
            <td><input type="text" name="href[]" id="href" value="<?=$row['href']?>"></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
        </tr>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        <?php
        }
        ?>
    </table>
    <div class="cent">
        <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>

<script>
function more() {
    let row = `<tr>
                <td><input type="text" name="text2[]"></td>
                <td><input type="text" name="href2[]"></td>
                <td></td>
            </tr>`
    $("#menu").append(row);
}
</script>