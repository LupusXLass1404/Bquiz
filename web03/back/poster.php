<h2 class="ct">預告片清單</h2>
<form action="./api/poster_edit.php" method="post" enctype="multipart/data-form">
    <div style="overflow: auto; height: 280px;">
    <table class="ct" width=100%>
        <tr>
            <td class="clo" width=15%>預告片海報</td>
            <td class="clo">預告片片名</td>
            <td class="clo">預告片排序</td>
            <td class="clo">操作</td>
        </tr>
        <?php
            $rows = $$db->all(" Order by `rank`");
            foreach($rows as $idx => $row):
                $prev = ($idx == 0) ? $row['id'] : $rows[$idx-1]['id'] ;
                $next = ($idx + 1) == count($rows) ? $row['id'] : $rows[$idx+1]['id'];
        ?>
        <tr>
            <td><img src="./upload/<?=$row['img'];?>" width=80%></td>
            <td><input type="text" name="name[]" value="<?=$row['name'];?>"></td>
            <td>
                <input type="button" value="往上" onclick="rank(<?=$row['id'];?>, <?=$prev;?>)">
                <input type="button" value="往下" onclick="rank(<?=$row['id'];?>, <?=$next;?>)">
            </td>
            <td>
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1 ?'checked':'';?>>顯示
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>">刪除
                <select name="ani[]">
                    <option value="1" <?=$row['ani']==1 ?'selected':'';?>>淡入淡出</option>
                    <option value="2" <?=$row['ani']==2 ?'selected':'';?>>滑入滑出</option>
                    <option value="3" <?=$row['ani']==3 ?'selected':'';?>>放大縮小</option>
                </select>
            </td>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    function rank(id, sw){
        $.post('./api/sw.php?db=Poster', {id, sw}, function(){
            location.reload();
        })
    }
</script>
<hr>
<h2 class="ct">新增預告片海報</h2>
<form action="./api/poster_add.php" method="post" enctype="multipart/form-data">
    <table class="ct" width=100%>
        <tr>
            <td>預告片海報：<input type="file" name="img" id="img"></td>
            <td>預告片片名：<input type="text" name="name" id="name"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>