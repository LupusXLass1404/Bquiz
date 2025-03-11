<?php include_once "db.php";
$_POST['id']=1;
$Bot->save($_POST);
to('../admin.php?do=bot');