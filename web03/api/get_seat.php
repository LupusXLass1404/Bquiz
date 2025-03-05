<?php include_once './db.php';
$rows = $Ticket->all(['name'=>$_POST['name'], 'date'=>$_POST['date'], 'session'=>$_POST['session']]);

$tmp = [];
foreach($rows as $s){
    $tmp = array_merge(unserialize($s['seat']), $tmp);
}
?>


<?php for($i = 0; $i < 20; $i++):?>
<div class="seat">
    <?=floor($i/5)+1;?>排<?=$i%5+1;?>號
    <?php if(in_array($i, $tmp)):?>
        <img src="./icon/03D03.png" alt="">
    <?php else: ?>
        <img src="./icon/03D02.png" alt="">
        <input class="chk" type="checkbox" value="<?=$i;?>">
    <?php endif; ?>
</div>
<?php endfor;?>

<div>
    您選擇的電影是：<?=$_POST['name'];?><br>
    您選擇的時刻是：<?=$_POST['date'];?> <?=$_POST['session'];?><br>
    已經勾選<span id="num">0</span>張票，最多可以購買4張票<br>
</div>
<div>
    <input type="button" onclick="prev()" value="上一步">
    <input type="button" onclick="checkout()" value="訂購">
</div>

<script>
    $('.chk').on('click', function(){
        let now = $(this).val()
        if($(this).prop('checked')){
            if(seat.length >=4){
                $(this).prop('checked', false);
            } else {
                seat.push(now);
            }
        } else {
            seat.splice(seat.indexOf(now),1);
        }
        $('#num').text(seat.length);
    })

    function checkout(){
        data.seat = seat;

        $.post('./api/checkout.php', data, function(res){
            $('#mm').html(res);
        })
    }
</script>