<?php include_once "db.php";
$_POST['no']=date("Ymd").rand(100000,999999);
$_POST['good']=serialize($_SESSION['buy']);
unset($_SESSION['buy']);
// dd($_POST);
$Order->save($_POST);

