<?php include_once "./db.php";
$_POST['qt'] = count($_POST['seat']);
$_POST['no'] = date('Ymd'). sprintf("%04d", $Ticket -> max('id')+1);
?>

<div class="tab">
    <p>感謝您的訂購，您的訂單編號是：<?=$_POST['no'];?></p>
    <table border=1 class="aut">
        <tr>
            <td width=20%>電影名稱：</td>
            <td><?=$_POST['movie'];?></td>
        </tr>
        <tr>
            <td >日期：</td>
            <td><?=$_POST['date'];?></td>
        </tr>
        <tr>
            <td>場次時間：</td>
            <td><?=$_POST['schedule'];?></td>
        </tr>
        <tr>
            <td>座位：</td>
            <td>
                <?php foreach($_POST['seat'] as $i): ?>
                    <?=ceil($i/5);?>排-<?=($i-1)%5+1;?>號<br>
                <?php endforeach; ?>
                共<?=$_POST['qt'];?>張電影票
            </td>
        </tr>
    </table>
    <p class="ct">
        <input type="button" value="確認" onclick="location.href='./index.php'">
    </p>
</div>


<?php 
$_POST['seat'] = serialize($_POST['seat']);
// dd($_POST);

$Ticket -> save($_POST);
?>
