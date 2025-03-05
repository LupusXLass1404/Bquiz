<?php include_once 'db.php';
$db = $_GET['db'];
dd($_POST);
foreach($_POST['id'] as $idx=>$id){
    if(isset($_POST['del'])&&in_array($id,$_POST['del'])){
        $$db->del($id);
    } else {
        $row=$$db->find($id);
        if(isset($row['text'])) $row['text']=$_POST['text'][$idx];
        $$db->save($row);
    }
}

to("../admin.php?do={$_GET['do']}");
