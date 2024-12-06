<?php
include_once "db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id) {
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Ad->del($id);
        } else {
            $row=$Ad->find($id);
            $row['text']=$_POST['text'][$idx];
            
            // echo $_POST['sh'];
            // echo "id = {$id}";
            // echo (isset($_POST['sh']) && in$_POST['sh']==$id)?1:0;
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $Ad->save($row);
        }
    }
}


echo "<pre>";
print_r($_POST);
echo "</pre>";

to("../admin.php?do=ad");

?>