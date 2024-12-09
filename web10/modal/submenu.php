<h3 class="cent">修改次選單</h3>
<hr>
<form action="api/insert.php" method="post" enctype="multipart/form-data">
    <table id="menu" style="margin: auto;">
        <tr>
            <td>主選單名稱</td>
            <td>選單網址連結</td>
            <td>刪除</td>
        </tr>
        <tr>
            <td><input type="twxt" name="text" id="text"></td>
            <td><input type="text" name="href" id="href"></td>
            <td><input type="checkbox" name="del[]"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>

<script>
function more() {
    let row = `<tr>
                <td><input type="twxt" name="text" id="text"></td>
                <td><input type="text" name="href" id="href"></td>
                <td></td>
            </tr>`
    $("#menu").append(row);
}
</script>