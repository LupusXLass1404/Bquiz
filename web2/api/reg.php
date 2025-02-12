<?php include_once "./db.php";

// dd($_POST);
// echo $User -> count(['acc'=>$_POST['acc']]);
if($User -> count(['acc'=>$_POST['acc']])){
    echo false;
} else {
    echo $User -> save($_POST);
}

?>