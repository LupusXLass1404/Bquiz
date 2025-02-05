<?php include_once "./db.php";

$db = ucfirst($_GET['do']);
// dd($_FILES);

if(isset($_FILES['img'])){
    $img = $_FILES['img'];
    move_uploaded_file($img['tmp_name'], "../upload/{$img['name']}");
    $_POST['img'] = $img['name'];
}

// dd($_POST);
$$db -> save($_POST);

to("../admin.php?do={$_GET['do']}");
?>