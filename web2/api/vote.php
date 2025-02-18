<?php include_once "./db.php";

dd($_POST);
$row = $Que -> find(['id'=> $_POST['vote']]);

$row['vote']++;
// dd($row);
$Que -> save($row);

to("../index.php?do=result&id={$row['main_id']};");