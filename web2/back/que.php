<h2>新增問卷</h2>
<hr>
<form action="./api/que.php" method="post">
    <div>
        問卷名稱：<input type="text" name="text" id="text">
    </div>
    <div id="add">
        選項：<input type="text" name="opt[]" id=""><input type="button" value="更多" onclick="add()">
    </div>
    
    <input type="submit" value="新增">
    <input type="reset" value="清空">
</form>

<script>
    function add(){
        $('#add').append(`<br>選項：<input type="text" name="opt[]" id="">`)
    }
</script>