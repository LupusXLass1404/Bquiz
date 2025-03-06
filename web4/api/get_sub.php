<?php include_once './db.php';
$rows=$Class->all(['main_id'=>$_POST['main']]);
foreach($rows as $row){
    echo "<option value='{$row['id']}'>{$row['text']}</option>";
}
?>