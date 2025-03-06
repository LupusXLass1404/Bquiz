<?php include_once 'db.php';
$db=ucfirst($_GET['do']);
dd($_POST);
if($$db->count($_POST)){
    $_SESSION[$_GET['do']]=$_POST['acc'];
}