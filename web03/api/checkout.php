<?php include_once './db.php';

$_POST['no'] = date('Ymd') . sprintf("%04d", $Ticket->max('id')+1);
?>

感謝您的訂購，您的訂單編號是：<?=$_POST['no'];?><br>
電影名稱：<?=$_POST['name'];?><br>
日期：<?=$_POST['date'];?><br>
場次時間：<?=$_POST['session'];?><br>
座位：<br>
<?php foreach($_POST['seat'] as $i):?>
    <?=floor($i/5)+1;?>排<?=$i%5+1;?>號<br>
<?php endforeach;?>
<?php
    $_POST['seat'] = serialize($_POST['seat']);
    $Ticket -> save($_POST);
?>
<input type="button" value="確認" onclick="lof('./index.php')">