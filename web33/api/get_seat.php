<?php include_once "db.php";
$rows=$Order->all([
    'movie'=>$_POST['movie'],
    'date'=>$_POST['date'],
    'session'=>$_POST['session']
]);

$seats=[];
foreach($rows as $row){
    $tmp=unserialize($row['seat']);
    $seats=array_merge($tmp,$seats);
}
?>

<div class="seats" id="seats">
<?php for ($i=0; $i < 20; $i++):?>
    <div class="seat">
        <?=ceil(($i+1)/5);?>排<?=$i%5+1;?>號<br>
        <?php if(in_array($i, $seats)):?>
            <img src="./icon/03D03.png" alt="">
        <?php else:?>
            <img src="./icon/03D02.png" alt="">
            <input type="checkbox" value="<?=$i;?>" class="box_seat">
        <?php endif;?>
    </div>
<?php endfor;?>
</div>
您選擇的電影是：<?=$_POST['movie'];?><br>
您選擇的時刻是：<?=$_POST['date'];?> <?=$_POST['session'];?><br>
您已勾選<span id="ticket">0</span>張票，最多可以購買4張票。<br><br>

<input type="button" value="返回" onclick="prev()">
<input type="button" value="訂購" onclick="booking()">
<script>
     $('.box_seat').on('change', function(){
        if($(this).prop('checked')){
            if(seat.length<4){
                seat.push($(this).val());
            } else {
                $(this).prop('checked',false);
                alert('最多可以勾選4張票');
            }
        } else {
            seat.splice(seat.indexOf($(this).val()),1);
        }
        $('#ticket').text(seat.length);
    })
</script>