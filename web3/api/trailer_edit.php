<?php include_once "./db.php";
$db = ucfirst($_GET['do']);

foreach($_POST['id'] as $idx => $id){
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){
        $$db -> del($id);
    } else {
        $row = $$db -> find($id);
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        $row['ami'] = $_POST['ami'][$idx];
        $$db -> save($row);
    }
}

to("../admin.php?do={$_GET['do']}");