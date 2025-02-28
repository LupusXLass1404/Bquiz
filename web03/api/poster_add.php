<?php include_once './db.php';

if(!empty($_FILES['img']['name'])){
    $img = $_FILES['img'];
    move_uploaded_file($img['tmp_name'], "../upload/{$img['name']}");

    $_POST['img'] = $img['name'];
}

$_POST['rank'] = $Poster->max('id')+1;
// dd($_POST);

$Poster->save($_POST);

to('../admin.php?do=poster');