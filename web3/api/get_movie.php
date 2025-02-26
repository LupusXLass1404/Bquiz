<?php include_once "./db.php";

$today = date('Y-m-d');
$ondate = date('Y-m-d', strtotime("-2 days"));

$rows = $Movie -> all(['sh'=>1], " AND ondate BETWEEN '$ondate' And '$today' Order by `rank`");

foreach($rows as $row){
    $now = (isset($_POST['id']) && $row['id'] == $_POST['id']) ? 'selected' : '';
    echo "<option value='{$row['id']}' $now>{$row['name']}</option>";
}
