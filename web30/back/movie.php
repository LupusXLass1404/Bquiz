<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="height:400px; overflow:auto;">
    <?php 
    $rows=$Movie->all(" order by rank");
    foreach($rows as $idx => $row):
        $prev = ($idx != 0) ? $rows[$idx - 1]['id'] : $row['id'];
        $next = ($idx != (count($rows) - 1)) ? $rows[$idx + 1]['id'] : $row['id'];
    ?>
    <table width=100%>
        <tr>
            <td rowspan=3 width=10%><img src="./upload/<?=$row['poster'];?>" style="width:80px;height:100px;"></td>
            <td rowspan=3 width=10%>分級：<img src="./icon/03C0<?=$row['level'];?>.png" alt=""></td>
            <td width=25%>片名：<?=$row['name'];?></td>
            <td width=25%>片長：<?=$row['length'];?></td>
            <td width=25%>上映時間：<?=$row['ondate'];?></td>
        </tr>
        <tr class="ct">
            <!-- <td></td>
            <td></td> -->
            <td>
                <button class="show" data-id="<?=$row['id'];?>"><?=$row['sh'] == 1 ? "隱藏" : "顯示";?></button>
            </td>
            <td>
                <button class="sw" data-id="<?=$row['id'];?>" data-sw="<?=$prev;?>">往上</button>
                <button class="sw" data-id="<?=$row['id'];?>" data-sw="<?=$next;?>">往下</button>
            </td>
            <td>
                <button onclick="location.href='?do=edit_movie&id=<?=$row['id'];?>'">編輯電影</button>
                <button class="del" data-id="<?=$row['id'];?>">刪除電影</button>
            </td>
        </tr>
        <tr>
            <!-- <td></td>
            <td></td> -->
            <td colspan=3><?=nl2br($row['intro']);?></td>
            <!-- <td></td>
            <td></td> -->
        </tr>
    </table>
    <hr>
    <?php endforeach; ?>
</div>

<script>
    $(".sw").on("click", function(){
        console.log("sw");
        
        let id = $(this).data('id');
        let sw = $(this).data('sw');

        $.post("./api/sw.php", {table: 'Movie', id, sw}, ()=>{
            location.reload();
        })
    })

    $(".show").on("click", function(){
        let id = $(this).data('id');
        console.log(id);

        $.post("./api/show.php", {id}, ()=>{
            location.reload();
        })
    })

    $(".del").on("click", function(){
        let id = $(this).data('id');

        $.post("./api/del.php", {table: 'Movie', id}, ()=>{
            location.reload();
        })
    })
</script>