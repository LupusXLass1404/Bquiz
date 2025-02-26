<?php include_once "./db.php";
$today = date('Y-m-d');
$row = $Movie -> find($_POST['movie']);
// dd($row);

for($i=0; $i < 3; $i++){
    $date = date('Y-m-d', strtotime("{$row['ondate']} +$i days"));
    if($date >= $today){
        echo "<option value='{$date}'>{$date}</option>";
    }
}

// $rows = $Movie -> all(['sh'=>1], " AND ondate BETWEEN '$ondate' And '$today' Order by `rank`");