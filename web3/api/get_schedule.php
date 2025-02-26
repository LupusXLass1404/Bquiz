<?php include_once "./db.php";
// dd($_POST);
$today = date('Y-m-d');
echo $today == $_POST['date'];
$now = date('H:i');
$first = date('H:i', strtotime('14:00'));
for($i = 0; $i <5; $i++){
    $start = date('H:i', strtotime("14:00 +".($i*2)." hour"));
    if(!($today == $_POST['date'] && $start < $now)){
        $end = date('H:i', strtotime("$start +2 hour"));
        if($end == "00:00") $end = "24:00";
        echo "<option value='{$i}'>{$start} ~ {$end}</option>";
        // 剩餘座位
    }
}
// h-m