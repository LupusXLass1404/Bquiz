<?php include_once "./db.php";

$Ticket->del([$_POST['type'] => $_POST['data']]);
