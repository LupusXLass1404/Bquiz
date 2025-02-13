<?php include_once "./db.php";
$Admin -> del($_GET['id']);

to("../admin.php?do=admin");
?>