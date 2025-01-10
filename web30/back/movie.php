<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="height:400px; overflow:auto;">
    <?php 
    $rows=$Movie->all(" order by rank");
    foreach($rows as $row):
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
                <button data-id="<?=$row['id'];?>">隱藏</button>
            </td>
            <td>
                <button data-id="<?=$row['id'];?>">往上</button>
                <button data-id="<?=$row['id'];?>">往下</button>
            </td>
            <td>
                <button onclick="location.href='?do=edit_movie&id=<?=$row['id'];?>'">編輯電影</button>
                <button data-id="<?=$row['id'];?>">刪除電影</button>
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