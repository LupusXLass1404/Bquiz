<?php include_once "db.php";
unset($_SESSION['buy'][$_GET['id']]);
to('../index.php?do=buycart');