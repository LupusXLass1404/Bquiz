<?php include_once "./db.php";

$acc = $_POST['acc'] ?? "";
$pw = $_POST['pw'] ?? "";

if ($User -> count(["acc"=>$acc])){
    if ($User -> count(["pw"=>$pw])){
        $_SESSION['login'] = $acc;
        echo "login";
    } else {
        echo "pw";
    }
} else {
    echo "acc";
}

// echo('ff');
?>