<?php include_once "./db.php";

if($User->count(['acc'=>$_POST['acc']])){
    if($User->count(['pw'=>$_POST['pw']])){
        $_SESSION['user'] = $User -> find($_POST)['acc'];
        echo $_SESSION['user'];
    } else {
        echo "pw";
    }
} else {
    echo "acc";
}