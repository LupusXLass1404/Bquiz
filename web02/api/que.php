<?php include_once "./db.php";
$db = ucfirst($_GET['do']);

$$db -> save(['text'=>$_POST['que']]);
$main_id = $$db -> find(['text'=>$_POST['que']])['id'];

foreach($_POST['op'] as $idx => $op){
    if(!empty($_POST['op'][$idx])){
        $$db -> save(['text'=>$op, 'main_id'=>$main_id]);
    }
}

to("../admin.php?do={$_GET['do']}");
