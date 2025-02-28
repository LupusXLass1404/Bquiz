<?php include_once './db.php';

if(!empty($_FILES['poster']['name'])){
    $poster = $_FILES['poster'];
    move_uploaded_file($poster['tmp_name'], "../upload/{$poster['name']}");

    $_POST['poster'] = $poster['name'];
}
if(!empty($_FILES['trailer']['name'])){
    $trailer = $_FILES['trailer'];
    move_uploaded_file($trailer['tmp_name'], "../upload/{$trailer['name']}");

    $_POST['trailer'] = $trailer['name'];
}

$_POST['ondate'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
unset($_POST['year'], $_POST['month'], $_POST['day']);

$_POST['rank'] = $Movie->max('id')+1;

$Movie -> save($_POST);

to('../admin.php?do=movie');