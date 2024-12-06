<?php
include_once "db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id) {
        if(isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Title->del($id);
        } else {
            $row=$Title->find($id);
            $row['text']=$_POST['text'][$idx];
            // echo $_POST['sh']==$id ? 'true' : 'false'."<br/>";
            $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id);
            $Title->save($row);
        }
    }
}


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

to("../admin.php?do=title");

?>