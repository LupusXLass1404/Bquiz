<?php include_once './db.php';

$db = ucfirst($_GET['do']);

$$db -> del($_GET['id']);

to("../admin.php?do={$_GET['do']}");
