<?php include_once "./db.php";

$acc = $_POST['acc'] ?? "";
$pw = $_POST['pw'] ?? "";

if ($User -> count(["acc"=>$acc])){
    if ($User -> count(["pw"=>$pw])){
        $_SESSION['login'] = $acc;
        if($acc=="admin"){
            echo "admin";
        } else {
            echo "login";
        }
    } else {
        echo "pw";
    }
} else {
    echo "acc";
}

// echo('ff');
?>