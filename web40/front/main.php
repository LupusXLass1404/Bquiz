<?php
$nav = '';
$typeId = $_GET['type'] ?? 0;
if($typeId == 0){
    $nav = "全部商品";
    $items = $Item -> all(["sh" => 1]);
} else {
    $type = $Type -> find($typeId);
    if($type['big_id'] == 0){
        $nav = $type['name'];
        $items = $Item -> all(["big"=>$typeId, "sh" => 1]);
    } else {
        $big = $Type -> find($type['big_id']);
        $nav = $big['name'] . " > " . $type['name'];
        $items = $Item -> all(["mid"=>$typeId, "sh" => 1]);
    }
}
?>
<h2><?=$nav;?></h2>
<style>
    .shop {
        display: flex;
        flex-wrap: wrap;
    }
    .item{
        width: 30%;
        border: 1px solid #333;
        margin: 4px;
        padding: 4px;
        border-radius: 8px;
    }
    .goodimg{
        width: 100%;
        height: 160px;
    }
</style>

<div class="shop">
    <?php
        // $rows = $Item -> all();
        foreach($items as $item):
    ?>
    <div class="item pp">
        <a href="?do=detail&id=<?=$item['id'];?>"><img class="goodimg" src="./upload/<?=$item['img'];?>" alt=""></a><br>
        <h3><?=$item['name'];?></h3>
        價錢：<?=$item['price'];?><br>
        規格：<?=$item['spec'];?>
        <hr>
        簡介：<?=mb_substr($item['intro'],0,20);?>...<br>
        <a href="?do=buycart&id=<?=$item['id'];?>&qt=1">
            <img src="./icon/0402.jpg" style="float:right">
        </a>
    </div>

    <?php
        endforeach;
    ?>
</div>

