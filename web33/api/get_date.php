<?php include "./db.php";

$row=$Movie->find($_POST['movie']);
$today = date("Y-m-d");

for($i = 0; $i < 3; $i++){
    $ondate = date("Y-m-d", strtotime("{$row['ondate']} +$i days"));
    if($ondate >= $today){
        echo "<option value='{$ondate}'>";
        echo $ondate;
        echo "</option>";
    }
}