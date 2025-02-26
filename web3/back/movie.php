<button onclick="location.href ='?do=movie_add'">新增電影</button>
<hr>
<style>
    .tab{
        height: 420px;
        overflow:auto;
    }
</style>
<div class="tab">
    <?php 
        $rows = $$db->all(" Order by `rank`");
        foreach($rows as $idx => $row): 
            // echo ($idx = 0);
            $prev = ($idx == 0) ? $row['rank'] : $rows[$idx-1]['rank'];
            $next = ($idx == (count($rows)-1)) ? $row['rank'] : $rows[$idx+1]['rank'];
    ?>
    <table class="ct" width=100%>
        <tr>
            <td rowspan=3 width=10%><img src="./upload/<?=$row['poster'];?>" alt="" width=100%></td>
            <td rowspan=3 width=15%>分級：<img src="./icon/03C0<?=$row['rating'];?>.png" style="vertical-align: middle;"></td>
            <td>片名：<?=$row['name'];?></td>
            <td>片長：<?=$row['lenght'];?></td>
            <td>上映時間：<?=$row['ondate'];?></td>
        </tr>
        <tr>
            <!-- <td></td> -->
            <!-- <td></td> -->
            <td>
                <input type="button" value="<?=$row['sh']==1?'隱藏':'顯示';?>" onclick="location.href='./api/sh.php?do=<?=$do;?>&id=<?=$row['id'];?>'">
            </td>
            <td>
                <input type="button" value="往上" onclick="rank(<?=$row['id'];?>, <?=$prev;?>)">
                <input type="button" value="往下" onclick="rank(<?=$row['id'];?>, <?=$next;?>)">
            </td>
            <td>
                <input type="button" value="編輯電影" onclick="location.href='?do=movie_edit&id=<?=$row['id'];?>'">
                <input type="button" value="刪除電影" onclick="location.href='./api/del.php?do=<?=$do;?>&id=<?=$row['id'];?>'">
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
    <?php 
        $prev = $row['rank'];
        endforeach; 
    ?>
</div>
<script>
    function rank(id, sw){
        $.post("./api/sw.php?db=Movie", {id, sw}, function(res){  
            console.log(res);
            location.reload();
        })
    }
</script>