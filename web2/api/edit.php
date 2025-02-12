<?php include_once "./db.php";
$db = ucfirst($_GET['do']);

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if(in_array($id, $_POST['del'])){
            $$db -> del($id);
        } else{
            $row = $$db -> find($id);
            
            if(isset($_POST['sh'])){
                $row['sh'] = (isset($_POST['sh'][$idx]) && in_array($id, $_POST['sh'])) ? "1" : "0";
            }
        
            $$db -> save($row);
        }
    }
}

to("../admin.php?do={$_GET['do']}");
?>