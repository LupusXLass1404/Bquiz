<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit.php?do=<?=$_GET['do'];?>">
        <table class="cent" width="100%">
            <tbody>
                <tr class="yel">
                    <td class="yel" width="45%">頁尾版權資料：</td>
                    <td width="23%"><input type="text" name="<?=$_GET['do'];?>" value="<?=$$db -> find(1)[$_GET['do']];?>"></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:100%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>