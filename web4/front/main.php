<?php 
$type = $_GET['type']??0;

$con = ['sh'=>1];

if($type==0){
    $h="全部商品";
}else{
    $class=$Class->find(['id'=>$type]);
    if($class['main_id']==0){
        // 大分類
        $con['main'] = $type;
    } else {
        // 中分類
        $con['sub'] = $type;
    }
    $h=$class['text'];
}

?>
<h2><?=$h;?></h2>
<?php
foreach($Good->all($con) as $row): 
?>
<div class="pp">
    <table>
        <tr>
            <td><a href="?do=intro&id=<?=$row['id'];?>"><img src="./upload/<?=$row['img'];?>" alt="" width=240px height=160px></a></td>
            <td>
            <h3><?=$row['name'];?> <a href="?do=buycart&id=<?=$row['id'];?>&qt=1"><img src="./icon/0402.jpg" alt=""></a></h3>
            價格：<?=$row['price'];?><br>
            規格：<?=$row['size'];?><br>
            簡介：<?=mb_substr($row['intro'],0,20);?>...<br>
            </td>
        </tr>
    </table>
</div>
<hr>
<?php endforeach;?>