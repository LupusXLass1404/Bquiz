<?php include_once './db.php';
$db = $_GET['db'];

$row = $$db -> find($_POST['id']);
$sw = $$db -> find($_POST['sw']);

$tmp = $row['rank'];
$row['rank'] = $sw['rank'];
$sw['rank'] = $tmp;

$$db -> save($row);
$$db -> save($sw);