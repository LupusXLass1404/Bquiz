<?php include_once 'db.php';

if(!isset($_POST['id'])){
    $_POST['no'] = rand(100000,999999);
}

if(!empty($_FILES['img']['name'])){
    $img=$_FILES['img'];
    move_uploaded_file($img['tmp_name'], "../upload/{$img['name']}");
    $_POST['img']=$img['name'];
}
// dd($_POST);
$Good -> save($_POST);
to('../admin.php?do=good');
?>