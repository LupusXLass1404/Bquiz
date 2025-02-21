<?php include_once "./db.php";
$_POST['user'] = $_SESSION['user'];
// dd($_POST);
$row = $News -> find(['id'=>$_POST['news']]);

if($Good -> count($_POST)){
    $row['good']--;
    echo $Good -> del($_POST);
} else {
    $row['good']++;
    $Good -> save($_POST);
}

$News -> save($row);