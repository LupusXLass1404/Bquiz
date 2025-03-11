<h1 class="ct">會員管理</h1>
<table width=100%>
    <tr class="ct tt">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php foreach($Mem->all() as $row): ?>
        <tr class="ct pp">
            <td><?=$row['name'];?></td>
            <td><?=$row['acc'];?></td>
            <td><?=$row['create_date'];?></td>
            <td>
                <input type="button" value="編輯" onclick="lof('?do=mem_edit&id=<?=$row['id'];?>')">
                <input type="button" value="刪除" onclick="lof('./api/del.php?do=mem&id=<?=$row['id'];?>')">
            </td>
        </tr>
    <?php endforeach; ?>
</table>