<?php
if(isset($_GET['id'])&&isset($_GET['qt'])){
    $_SESSION['buy'][$_GET['id']] = $_GET['qt'];
}
if(!isset($_SESSION['mem'])){
    to('?do=login');
}
?>

<h1 class="ct"><?=$_SESSION['mem'];?>的購物車</h1>
<table class="tab aut" width=100%>
    <tr class="ct tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    if(isset($_SESSION['buy'])):
    foreach($_SESSION['buy'] as $id=>$qt):
        $row=$Good->find($id)
    ?>
        <tr class="ct pp">
            <td><?=$row['no'];?></td>
            <td><?=$row['name'];?></td>
            <td><?=$qt;?></td>
            <td><?=$row['stock'];?></td>
            <td><?=$row['price'];?></td>
            <td><?=$row['price']*$qt;?></td>
            <td><img src="./icon/0415.jpg" alt="" onclick="lof('./api/buycart_del.php?id=<?=$row['id'];?>')"></td>
        </tr>
    <?php
    endforeach;
    endif;
    ?>
</table>
<p class="ct">
    <img src="./icon/0411.jpg" onclick="lof('./index.php')">
    <img src="./icon/0412.jpg" onclick="lof('?do=checkout')">
</p>