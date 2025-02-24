<?php include_once "./db.php";
$db = $_GET['db'];

dd($_POST);

$now = $$db -> find(['id'=>$_POST['id']]);
$sw = $$db -> find(['rank'=>$_POST['sw']]);

$now['rank'] = $_POST['sw'];
$sw['rank'] = $_POST['id'];

dd($now);
dd($sw);

$$db -> save($now);
$$db -> save($sw);