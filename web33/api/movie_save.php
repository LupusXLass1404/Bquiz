<?php include_once "db.php";

if(!empty($_FILES['poster']['name'])){
    $pos=$_FILES['poster'];
    move_uploaded_file($pos['tmp_name'], "../upload/{$pos['name']}");
    $_POST['poster'] = $pos['name'];
}

if(!empty($_FILES['trailer']['name'])){
    $tra=$_FILES['trailer'];
    move_uploaded_file($tra['tmp_name'], "../upload/{$tra['name']}");
    $_POST['trailer'] = $tra['name'];
}

$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']);

if(!isset($_POST['id'])) $_POST['rank']=$Movie->max('id')+1;

$Movie->save($_POST);
to('../admin.php?do=movie');