<input type="button" value="新增電影" onclick="lof('?do=movie_add')">
<hr>
<div style="height:440px;overflow:auto">
    <?php
        $rows=$$db->all(" Order by `rank`");
        foreach($rows as $idx=>$row):
            $prev = $idx==0 ? $row['id']: $rows[$idx-1]['id'];
            $next = $idx>=count($rows)-1 ? $row['id'] : $rows[$idx+1]['id'];
    ?>
    <table width=100%>
        <tr>
            <td rowspan=3 width=10%><img src="./upload/<?=$row['poster'];?>" alt="" width=90%></td>
            <td rowspan=3 width=12%>分級：<img src="./icon/03C0<?=$row['rating'];?>.png" alt=""></td>
            <td>片名：<?=$row['name'];?></td>
            <td>片長：<?=$row['length'];?></td>
            <td>上映時間：<?=$row['ondate'];?></td>
        </tr>
        <tr>
            <!-- <td></td>
            <td></td> -->
            <td>
                <input type="button" value="<?=$row['sh']==1?'隱藏':'顯示';?>" onclick="lof('./api/sh.php?do=<?=$do;?>&id=<?=$row['id'];?>')">
            </td>
            <td>
                <input type="button" value="往上" onclick="sw(<?=$row['id'];?>,<?=$prev?>)">
                <input type="button" value="往下" onclick="sw(<?=$row['id'];?>,<?=$next;?>)">
            </td>
            <td>
                <input type="button" value="編輯電影" onclick="lof('?do=movie_edit&id=<?=$row['id'];?>')">
                <input type="button" value="刪除電影" onclick="lof('./api/del.php?do=<?=$do;?>&id=<?=$row['id'];?>')">
            </td>
        </tr>
        <tr>
            <!-- <td></td>
            <td></td> -->
            <td colspan=3>劇情介紹：<?=nl2br($row['intro']);?></td>
            <!-- <td></td>
            <td></td> -->
        </tr>
    </table>
    <hr>
    <?php endforeach;?>
</div>

<script>
    function sw(id,sw){
        $.post("./api/sw.php?do=movie",{id,sw},function(res){
            location.reload();
        })
    }
</script>

