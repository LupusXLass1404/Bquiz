<?php
include_once "./db.php";

$table=$_GET['table'];
$db=ucfirst($table);

echo $table;

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

if(isset($_POST['pw2'])){
    unset($_POST['pw2']);
}

$$db->save($_POST);

to("../admin.php?do=$table");