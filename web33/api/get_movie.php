<?php include_once 'db.php';

$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("$today -2 days"));

$rows = $Movie->all(['sh'=>1], " AND `ondate` Between '$ondate' and '$today' order by `rank`");

foreach($rows as $row){
    $now = $_POST['id']==$row['id']?'selected':'';
    echo "<option value='{$row['id']}' $now>";
    echo $row['name'];
    echo "</option>";
}