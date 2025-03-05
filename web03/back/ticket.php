<?php $rows = $$db->all();?>
<h2 class="ct">訂單清單</h2>
<p>快速刪除：
    <input type="radio" name="type" value="date">
    依日期<input type="text" name="date" id="date">

    <input type="radio" name="type" value="name">
    依電影
    <select name="movie" id="movie"></select>
</p>
<div style="">
    <table class="ct" width=100%>
        <tr class="clo ct">
            <td>訂單編號</td>
            <td>電影名稱</td>
            <td>日期</td>
            <td>場次時間</td>
            <td>訂購數量</td>
            <td>訂購位置</td>
            <td>操作</td>
        </tr>
        <?php foreach($rows as $row): ?>
            <tr>
                <td><?=$row['no'];?></td>
                <td><?=$row['name'];?></td>
                <td><?=$row['date'];?></td>
                <td><?=$row['session'];?></td>
                <td><?=$row['qt'];?></td>
                <td>
                <?php foreach(unserialize($row['seat']) as $i):?>
                    <?=floor($i/5)+1;?>排<?=$i%5+1;?>號<br>
                <?php endforeach;?>
                </td>
                <td><input type="button" value="刪除電影" onclick="lof('./api/del.php?do=ticket&id=<?=$row['id'];?>')"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script>


    confirm('確定要刪除符合條件的訂單嗎？')
</script>
