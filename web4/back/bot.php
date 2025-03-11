<h1 class="ct">編輯頁尾版權管理</h1>
<form action="./api/bot.php" method="post">
    <table width=100%>
        <tr>
            <td class="ct tt">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="text" id="text" value="<?=$Bot->find(1)['text'];?>"></td>
        </tr>
    </table>
    <p class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
    </p>
</form>