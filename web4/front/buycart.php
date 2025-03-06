<?php
if(isset($_GET['id'])&&isset($_GET['qt'])){
    $_SESSION['buy'][$_GET['id']] = $_GET['qt'];
}
if(!isset($_SESSION['mem'])){
    to('?do=login');
}
?>