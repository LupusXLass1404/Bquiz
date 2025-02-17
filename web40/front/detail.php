<?php
$item = $Item -> find($_GET['id']);
?>

<style>
    .shop {
        display: flex;
        flex-wrap: wrap;
    }
    .item{
        width: 100%;
        border: 1px solid #333;
        margin: 4px;
        padding: 4px;
        border-radius: 8px;
    }
    .goodimg{
        width: 80%;
        /* height: 160px; */
    }
</style>

<div class="shop">

    <div class="item pp">
        <h1><?=$item['name'];?></h1>
        <a class="goodimg" href="?do=detail&id=<?=$item['id'];?>"><img class="goodimg" src="./upload/<?=$item['img'];?>" alt=""></a><br>
        分類：<?=$Type -> find($item['big'])['name'];?> > <?=$Type -> find($item['mid'])['name'];?>
        <br>
        編號：<?=$item['no'];?>
        <br>
        價錢：<?=$item['price'];?>
        <br>
        規格：<?=$item['spec'];?>
        <hr>
        詳細說明：<?=nl2br($item['intro']);?>
        <br>
        庫存量：<?=$item['stock'];?><br>
        <hr>
        <div class="ct">
            <input type="number" name="qt" id="qt" value='1'>
            <img src="./icon/0402.jpg" alt="" onclick="buy()">
        </div>
    </div>
</div>

<script>
    function buy(){
        let qt = $("#qt").val();
        lof(`?do=buycart&id=<?=$_GET['id'];?>&qt=${qt}`)
    }
</script>
