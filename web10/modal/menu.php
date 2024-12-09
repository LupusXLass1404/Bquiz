<h3 class="cent">新增主選單</h3>
<hr>
<form action="api/insert.php?table=<?=$_GET['do'];?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>主選單名稱：</td>
            <td><input type="twxt" name="text" id="text"></td>
        </tr>
        <tr>
            <td>選單網址連結：</td>
            <td><input type="text" name="href" id="href"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>