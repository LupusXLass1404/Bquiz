<?php include_once "./db.php";
if(isset($_POST)){
    $row = $User -> find($_POST);
    echo $row['pw'] ?? false;
}
?>