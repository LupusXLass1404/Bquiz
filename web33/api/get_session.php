<?php include_once "db.php";
$movie=$Movie->find($_POST['movie'])['name'];
$sess=[
    '14:00~16:00',
    '16:00~18:00',
    '18:00~20:00',
    '20:00~22:00',
    '22:00~24:00'
];
$seat=20;
$time = date("G") - 13 ;
$now = $time > 0 ? ceil($time/2) : 0;

for ($i=$now; $i < 5; $i++) { 
    
    $booking=$Order->sum('qt',[
        'movie'=>$movie,
        'date'=>$_POST['date'],
        'session'=>$sess[$i]
    ]);
    $seat=20-$booking;
    echo "<option value='{$sess[$i]}'>";
    echo $sess[$i];
    echo " 剩餘座位：$seat";
    echo "</option>";
}