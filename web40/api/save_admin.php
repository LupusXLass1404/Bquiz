<?php include_once "./db.php";
dd($_POST);

if(!empty($_POST['pr'])){
    $_POST['pr'] = serialize($_POST['pr']);
} else {
    $_POST['pr'] = serialize([]);
}

$Admin->save($_POST);

to("../admin.php?do=admin");
?>