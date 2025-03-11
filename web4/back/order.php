<h1 class="ct">訂單管理</h1>
<table class="ct tab aut" width=100%>
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php foreach($$db->all() as $row): ?>
        <tr class="pp">
            <td><a href="?do=detail&id=<?=$row['id'];?>"><?=$row['no'];?></a></td>
            <td><?=$row['total'];?></td>
            <td><?=$row['acc'];?></td>
            <td><?=$row['name'];?></td>
            <td><?=$row['date'];?></td>
            <td><input type="button" value="刪除" onclick="lof('./api/del.php?do=order&id=<?=$row['id'];?>')"></td>
        </tr>
    <?php endforeach; ?>
</table>