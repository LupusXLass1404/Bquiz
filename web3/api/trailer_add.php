<?php include_once "./db.php";
dd($_FILES);
$db = ucfirst($_GET['do']);

if(!empty($_FILES['img']['name'])){
    $img = $_FILES['img'];
    move_uploaded_file($img['tmp_name'], "../upload/".$img['name']);

    $_POST['img'] = $img['name'];
}

$_POST['rank'] = $$db -> max("id")+1;
dd($_POST);

$$db -> save($_POST);

to("../admin.php?do={$_GET['do']}");