<h3 class="cent">新增最新消息資料</h3>
<hr>
<form action="api/insert.php?table=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>最新消息資料：</td>
            <td><input type="text" name="text" id="text"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>