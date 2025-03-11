<h1 class="ct">新增管理員</h1>
<form action="./api/admin_save.php" method="post">
    <table width=100%>
        <tr>
            <td class="ct tt">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="ct tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="ct tt">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="per[]" id="" value="1">商品分類與管理</div>
                <div><input type="checkbox" name="per[]" id="" value="2">訂單管理</div>
                <div><input type="checkbox" name="per[]" id="" value="3">會員管理</div>
                <div><input type="checkbox" name="per[]" id="" value="4">頁尾版權管理</div>
                <div><input type="checkbox" name="per[]" id="" value="5">最新消息管理</div>
            </td>
        </tr>
    </table>
    <p class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </p>
</form>