<?php include_once "./db.php";

$db = ucfirst($_GET['do']);
dd($_POST);

foreach($_POST['id'] as $idx => $id){
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){
        $$db -> del($id);
    } else {
        $row['id'] = $id;

        if(isset($_POST['text'])){
            $row['text'] = $_POST['text'][$idx];
        }
        
        $row['sh'] = isset($_POST['sh']) && in_array($id, $_POST['sh']) ? 1 : 0;
    
        $$db -> save($row);
    }
}

to("../admin.php?do={$_GET['do']}");
?>