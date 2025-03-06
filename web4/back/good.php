
<a href="?do=th">商品分類</a>／<a href="?do=good">商品管理</a>
<h1>商品管理</h1>
<input type="button" value="新增商品" onclick="lof('?do=good_add')">
<table width=100%>
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php foreach($$db->all() as $row): ?>
    <tr class="pp">
        <td class="ct"><?=$row['no'];?></td>
        <td><?=$row['name'];?></td>
        <td class="ct"><?=$row['stock'];?></td>
        <td class="ct"><?=$row['sh']==1?"販售中":"已下架";?></td>
        <td class="ct">
            <input type="button" value="修改" onclick="lof('?do=good_edit&id=<?=$row['id'];?>')">
            <input type="button" value="刪除" onclick="lof('./api/del.php?do=<?=$do;?>&id=<?=$row['id'];?>')">
            <input type="button" value="上架" onclick="lof('./api/sh.php?do=<?=$do;?>&id=<?=$row['id'];?>&sh=1')">
            <input type="button" value="下架" onclick="lof('./api/sh.php?do=<?=$do;?>&id=<?=$row['id'];?>&sh=0')">
        </td>
    </tr>
    <?php endforeach; ?>
</table>