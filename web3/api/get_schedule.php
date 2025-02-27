<?php include_once "./db.php";
// dd($_POST);

$today = date('Y-m-d');
$now = date('G') - 13;

$start = ($now > 0 && $_POST['date'] == $today) ? ceil($now/2) : 0; 

$sees = [
    '14:00~16:00',
    '16:00~18:00',
    '18:00~20:00',
    '20:00~22:00',
    '22:00~24:00',
];


for($i = $start; $i < 5; $i++){
    $_POST['schedule'] = $sees[$i];
    $booked = $Ticket -> sum('qt', $_POST);
    $seat = 20 - $booked;
    echo "<option value='{$sees[$i]}'>";
    echo $sees[$i];
    echo " 剩餘座位 {$seat}";
    echo "</option>";
}

// $today = date('Y-m-d');
// $now = date('H:i');
// $first = date('H:i', strtotime('14:00'));
// for($i = 0; $i <5; $i++){
//     $start = date('H:i', strtotime("14:00 +".($i*2)." hour"));
//     if(!($today == $_POST['date'] && $start < $now)){
//         $end = date('H:i', strtotime("$start +2 hour"));
//         if($end == "00:00") $end = "24:00";
//         echo "<option value='{$start}~{$end}'>{$start}~{$end}</option>";
//         // 剩餘座位
//     }
// }