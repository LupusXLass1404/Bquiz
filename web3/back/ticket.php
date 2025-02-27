<div class="tab">
    <p>
        快速刪除：
        <input type="radio" name="del" value="date" id="date">依日期<input type="text" name="date" id="date">
        <input type="radio" name="del" value="movie">依電影
        <select name="movie" id="movie">
            <?php 
                $rows = $$db -> all("GROUP BY `movie`");
                dd($rows);
                foreach($rows as $row): 
            ?>
                <option value="<?=$row['movie'];?>"><?=$row['movie'];?></option>
            <?php endforeach; ?>
        </select>
        <input type="button" value="刪除" onclick="qdel()">
    </p>
    <script>
        function qdel(){
            let type = $('input[name="del"]:checked').val();
            let data = '';
            if(type){
                if(type == "date") data = $('#date').val();
                if(type == "movie") data = $('#movie').val();
    
                if(confirm(`確認要刪除「${data}」的所有訂單嗎？`)){
                    $.post('./api/qdel.php', {type,data}, function(
                        location.reload();
                    ))
                }
            }
        }
    </script>
    <style>
        .tr td {
            border-bottom: 1px solid #333;
        }
    </style>
    <table width=100% class="ct">
        <tr class="clo">
            <td>訂單編號</td>
            <td>電影名稱</td>
            <td>日期</td>
            <td>場次時間</td>
            <td>訂購數量</td>
            <td>訂購位置</td>
            <td>操作</td>
        </tr>
        <?php foreach($$db -> all() as $row): ?>
        <tr class="tr">
            <td><?=$row['no'];?></td>
            <td><?=$row['movie'];?></td>
            <td><?=$row['date'];?></td>
            <td><?=$row['schedule'];?></td>
            <td><?=$row['qt'];?></td>
            <td>
                <?php  foreach(unserialize($row['seat']) as $i): ?>
                    <?=ceil($i/5);?>排-<?=($i-1)%5+1;?>號<br>
                <?php endforeach; ?>
            </td>
            <td>
                <input type="button" value="刪除" onclick="location.href='./api/del.php?do=<?=$do;?>&id=<?=$row['id'];?>'">
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>