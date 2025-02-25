<?php include_once "./db.php";
$db = ucfirst($_GET['do']);

$$db -> del($id);

to("../admin.php?do={$_GET['do']}");