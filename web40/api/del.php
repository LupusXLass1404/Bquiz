<?php include_once "./db.php";
$db = $_POST['table'];
// echo $_POST['id'];
$$db -> del($_POST['id']);

?>