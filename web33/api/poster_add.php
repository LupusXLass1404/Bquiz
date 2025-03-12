<?php include_once "db.php";

if(!empty($_FILES['poster']['name'])){
    $pos=$_FILES['poster'];
    move_uploaded_file($pos['tmp_name'], "../upload/{$pos['name']}");
    $_POST['poster'] = $pos['name'];
}

$_POST['rank']=$Poster->max('id')+1;

dd($_POST);
$Poster->save($_POST);
to('../admin.php?do=poster');