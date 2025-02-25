<?php include_once "./db.php";
$db = $_GET['db'];

dd($_POST);

$now = $$db -> find(['id'=>$_POST['id']]);
$sw = $$db -> find(['rank'=>$_POST['sw']]);

$sw['rank'] = $now['rank'];
$now['rank'] = $_POST['sw'];

dd($now);
dd($sw);

$$db -> save($now);
$$db -> save($sw);