<?php include_once './db.php';
$today = date("Y-m-d");
$row = $Movie -> find($_POST['movie']);

for($i=0; $i < 3; $i++){
    $ondate = date("Y-m-d", strtotime("{$row['ondate']} +{$i} days"));
    if($ondate >= $today){
        echo "<option value='$ondate'>";
        echo $ondate;
        echo "</option>";
    }
}
?>