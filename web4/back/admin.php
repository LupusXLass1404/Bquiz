<h1 class="ct">管理權限設置</h1>
<p class="ct"><input type="button" value="新增管理員" onclick="lof('?do=admin_add')"></p>
<table width=100%>
    <tr class="ct tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php foreach($Admin->all() as $row): ?>
        <tr class="ct pp">
            <td><?=$row['acc'];?></td>
            <td><?=str_repeat("*", mb_strlen($row['pw']));?></td>
            <td>
                <?php if($row['acc']=="admin"): ?>
                    此帳號為最高權限
                <?php else: ?>
                    <input type="button" value="修改" onclick="lof('?do=admin_edit&id=<?=$row['id'];?>')">
                    <input type="button" value="刪除" onclick="lof('./api/del.php?do=admin&id=<?=$row['id'];?>')">
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>