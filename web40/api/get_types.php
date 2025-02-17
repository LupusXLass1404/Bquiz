<?php include_once "./db.php";

$big_id = $_GET['big_id'] ?? 0;
$rows = $Type -> all(['big_id'=>$big_id]);

foreach($rows as $row){
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
?>


