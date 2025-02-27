<?php include_once "./db.php";

$Ticked->del([$_POST['type']=>$_POST['data']]);