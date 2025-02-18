<?php include_once "./db.php";

$row = $News -> find($_POST['id']);

$tmp['news'] = $_POST['id'];
$tmp['user'] = $_SESSION['login'];

if($Good -> count($tmp)){
    $Good -> del($tmp);
    $row['like']--;
} else {
    echo $Good -> save($tmp);
    $row['like']++;
}

$News -> save($row);

?>