<?php include_once "./db.php";

if($User->count(['acc'=>$_POST['acc']])){
    echo 1;
} else {
    $User -> save($_POST);
}