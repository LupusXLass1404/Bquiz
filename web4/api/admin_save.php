<?php include_once "db.php";
dd($_POST);

if(isset($_POST['per'])){
    $_POST['per']=serialize($_POST['per']);
} else {
    $_POST['per']=serialize([0]);
}

// dd($_POST);

$Admin->save($_POST);
to('../admin.php?do=admin');
