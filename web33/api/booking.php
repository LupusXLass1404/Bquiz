<?php include_once "db.php";
$_POST['no']=date("Ymd"). sprintf("%04d",$Order->max('id')+1);

?>
感謝您的訂購，您的訂單編號是：<?=$_POST['no'];?>
<br>
電影名稱：<?=$_POST['movie'];?>
<br>
日期：<?=$_POST['date'];?>
<br>
場次時間：<?=$_POST['session'];?>
<br>
座位：<br>
<?php foreach($_POST['seat'] as $i):?>
    <?=ceil(($i+1)/5);?>排<?=$i%5+1;?>號<br>
<?php endforeach;?>
<br>
共<?=$_POST['qt'];?>張電影票
<br>
<?php include_once "db.php";
$_POST['seat']=serialize($_POST['seat']);
$Order->save($_POST);
?>
<input type="button" value="確定" onclick="lof('./index.php')">
