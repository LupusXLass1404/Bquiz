<?php include_once "./db.php";

dd($_FILES);
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'], "../upload/". $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

if(!isset($_POST['id'])){
    $_POST['sh'] = 1;
    $_POST['no'] = rand(100000,999999);
} 

dd($_POST);

$Item -> save($_POST);

to("../admin.php?do=th");