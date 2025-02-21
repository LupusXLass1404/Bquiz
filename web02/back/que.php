<fieldset class="tab aut">
    <legend>新增問卷</legend>
    <form action="./api/que.php?do=<?=$do;?>" method="post">
        <table id="que" class="tab aut">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="que"></td>
            </tr>
            <tr class="clo">
                <td colspan=2>選項：<input type="text" name="op[]"><input type="button" value="更多" onclick="addQue()"></td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>

<script>
    function addQue(){
        $('#que').append(`
        <tr class="clo">
            <td colspan=2>選項：<input type="text" name="op[]"></td>
        </tr>
        `)
    }
</script>