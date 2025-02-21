<?php include_once "./db.php";
dd($_POST['vote']);

$row = $Que -> find($_POST['vote']);
dd($row);
$row['vote']++;
$Que -> save($row);

$main = $Que -> find($_GET['id']);
$main['vote']++;
dd($main);
$Que -> save($main);

to("../index.php?do=result&id={$_GET['id']}");