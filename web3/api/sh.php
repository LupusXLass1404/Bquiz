<?php include_once "./db.php";
$db = ucfirst($_GET['do']);

$row = $$db -> find($_GET['id']);
$row['sh'] = $row['sh'] == 0 ? 1 : 0;

$$db -> save($row);


to("../admin.php?do={$_GET['do']}");