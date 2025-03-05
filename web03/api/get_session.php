<?php include_once './db.php';
$today = date("Y-m-d");
// $row = $Movie -> find($_POST['data']['movie']);

$sess = [
    '14:00~16:00',
    '16:00~18:00',
    '18:00~20:00',
    '20:00~22:00',
    '22:00~24:00',
];


$now = date("G") - 13;
$t = ($_POST['date'] == $today && $now > 0) ? ceil($now/2) : 0;

$rows = $Ticket->all(['name'=>$_POST['name'], 'date'=>$_POST['date'], 'session'=>$_POST['session']]);

for($i = $t; $i < 5; $i++){

    $booked = $Ticket->sum('qt',['movie'=>$_POST['movie'], 'date'=>$_POST['date'], 'session'=>$sess[$i]]);
    $last = 20 - $booked;
    echo "<option value='$sess[$i]'>";
    echo $sess[$i];
    echo " 剩餘座位：$last";
    echo "</option>";
}
?>