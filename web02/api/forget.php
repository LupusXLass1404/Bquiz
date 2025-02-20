<?php include_once "./db.php";

if($User -> count($_POST)){
    $pw = $User -> find($_POST)['pw'];
    echo "您的密碼為：".$pw;
} else {
    echo "查無此資料"
}