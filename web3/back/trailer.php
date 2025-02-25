<div class="tab ct rb c">
    <h3 style="margin:4px">預告片清單</h3>
</div>
<div class="tab" style="height:180px; overflow: auto;">
    <form action="./api/<?=$do;?>_edit.php?do=<?=$do;?>" method="post">
        <table width=100%>
            <tr class="ct clo wx">
                <td width=15%>預告片海報</td>
                <td width=40%>預告片片名</td>
                <td>預告片排序</td>
                <td width=30%>操作</td>
            </tr>
            <?php 
                $rows = $$db->all(" Order by `rank`");
                foreach($rows as $idx => $row): 
                    // echo ($idx = 0);
                    $prev = ($idx == 0) ? $row['rank'] : $rows[$idx-1]['rank'];
                    $next = ($idx == (count($rows)-1)) ? $row['rank'] : $rows[$idx+1]['rank'];
            ?>
            <tr class="ct">
                <td><img src="./upload/<?=$row['img'];?>" width=70%></td>
                <td><?=$row['name'];?></td>
                <td>
                    <input type="button" value="往上" onclick="rank(<?=$row['id'];?>, <?=$prev;?>)">
                    <input type="button" value="往下" onclick="rank(<?=$row['id'];?>, <?=$next;?>)">
                </td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1?"checked":"";?>>顯示
                    <input type="checkbox" name="del[]" value="<?=$row['id'];?>">刪除
                    <select name="ami[]">
                        <option value="1" <?=$row['ami']==1?"selected":"";?>>淡入淡出</option>
                        <option value="2" <?=$row['ami']==2?"selected":"";?>>滑出滑入</option>
                        <option value="3" <?=$row['ami']==3?"selected":"";?>>放大縮小</option>
                    </select>
                </td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
            <?php 
                $prev = $row['rank'];
                endforeach; 
            ?>
        </table>
    </div>
    <div class="ct tab">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    function rank(id, sw){
        $.post("./api/sw.php?db=Trailer", {id, sw}, function(res){  
            console.log(res);
            location.reload();
        })
    }
</script>
<hr>

<div class="tab ct rb c">
    <h3 style="margin:4px">新增預告片海報</h3>
</div>
<div class="tab">
    <form action="./api/<?=$do;?>_add.php?do=<?=$do;?>" method="post" enctype="multipart/form-data">
        <table width=100% class=ct>
            <tr>
                <td>
                    預告片海報：<input type="file" name="img" id="img">
                </td>
                <td>
                    預告片片名：<input type="text" name="name" id="name">
                </td>
            </tr>
        </table>
        <div class="ct tab">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
