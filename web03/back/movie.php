<button onclick="lof('?do=movie_add')">新增電影</button>
<hr>
<div style="overflow: auto; height: 420px;">
    <?php
        $rows = $$db->all(" Order by `rank`");

        foreach($rows as $idx => $row):
            $prev = ($idx == 0) ? $row['id'] : $rows[$idx-1]['id'] ;
            $next = ($idx + 1) == count($rows) ? $row['id'] : $rows[$idx+1]['id'];
    ?>
    <table class="ct" width=100% border=1>
        <tr>
            <td rowspan=3 width=15%><img src="./upload/<?=$row['poster'];?>" width=80%></td>
            <td rowspan=3>分級：<img src="./icon/03C0<?=$row['rating'];?>.png" style="vertical-align: middle;"></td>
            <td width=20%>片名：<?=$row['name'];?></td>
            <td width=20%>片長：<?=$row['length'];?></td>
            <td width=30%>上映日期：<?=$row['ondate'];?></td>
        </tr>
        <tr>
            <!-- <td></td> -->
            <!-- <td></td> -->
            <td>
                <input type="button" value="<?=$row['sh']==1?'隱藏':'顯示';?>" onclick="lof('./api/sh.php?do=movie&id=<?=$row['id'];?>')">
            </td>
            <td>
                <input type="button" value="往上" onclick="rank(<?=$row['id'];?>, <?=$prev;?>)">
                <input type="button" value="往下" onclick="rank(<?=$row['id'];?>, <?=$next;?>)">
            </td>
            <td>
                <input type="button" value="編輯電影" onclick="lof('?do=movie_edit&id=<?=$row['id'];?>')">
                <input type="button" value="刪除電影" onclick="lof('./api/del.php?do=movie&id=<?=$row['id'];?>')">
            </td>
        </tr>
        <tr>
            <!-- <td></td>
            <td></td> -->
            <td colspan=3 align=left>劇情介紹：<?=nl2br($row['intro']);?></td>
            <!-- <td></td>
            <td></td> -->
        </tr>
    </table>
    <hr>
    <?php endforeach; ?>
</div>
<script>
    function rank(id, sw){
        $.post('./api/sw.php?db=Movie', {id, sw}, function(){
            location.reload();
        })
    }
</script>
