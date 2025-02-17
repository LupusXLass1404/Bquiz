<?php
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=[];
}

if(!empty($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['Mem'])){
    to("index.php?do=login");
}

// dd($_SESSION['cart']);
?>

<h2 class="ct"><?=$_SESSION['Mem'];?>的購物車</h2>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>
    <?php
    foreach($_SESSION['cart'] as $id => $qt):
        $item = $Item -> find($id);
    ?>
    <tr class="pp">
        <td class="ct"><?=$item['no'];?></td>
        <td><?=$item['name'];?></td>
        <td class="ct"><?=$qt;?></td>
        <td class="ct"><?=$item['stock'];?></td>
        <td class="ct"><?=$item['price'];?></td>
        <td class="ct"><?=$item['price']*$qt;?></td>
        <td class="ct">
            <img src="./icon/0415.jpg" alt="" onclick="delCart(<?=$id;?>)">
        </td>
    </tr>
    <?php
    endforeach;
    ?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg" onclick="lof('./index.php')">
    <img src="./icon/0412.jpg" onclick="lof('?do=checkout')">
</div>
<script>
    function delCart(id){
        $.post("./api/delcart.php", {id}, function(){   
            lof("?do=buycart");
        })
    }

</script>