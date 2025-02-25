<?php include_once "./db.php";
$db = "Movie";

foreach($_FILES as $key => $img){
    if(!empty($img['name'])){
        move_uploaded_file($img['tmp_name'], "../upload/".$img['name']);

        $_POST[$key] = $img['name'];
    }
}

$_POST['ondate']= $_POST['year'] . "-" . $_POST['month']. "-" . $_POST['day'];
unset($_POST['year'], $_POST['month'], $_POST['day']);

if(!isset($_POST['id'])){
    $_POST['rank'] = ($$db -> max('id')) + 1;
}

dd($_POST);

$$db -> save($_POST);

to("../admin.php?do=movie");