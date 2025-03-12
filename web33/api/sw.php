<?php include_once "db.php";
$db=ucfirst($_GET['do']);

$my=$$db->find($_POST['id']);
$sw=$$db->find($_POST['sw']);

$tmp = $my['rank'];
$my['rank'] = $sw['rank'];
$sw['rank'] = $tmp;

$$db->save($my);
$$db->save($sw);