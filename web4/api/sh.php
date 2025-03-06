<?php include_once 'db.php';
$db=ucfirst($_GET['do']);
$row=$$db->find($_GET['id']);
$row['sh']=$_GET['sh'];
$$db->save($row);
to("../admin.php?do={$_GET['do']}");