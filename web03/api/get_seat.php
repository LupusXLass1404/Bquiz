<?php include_once './db.php';
?>


<?php for($i = 0; $i < 20; $i++):?>
<div class="seat">
    <?=floor($i/5)+1;?>排<?=$i%5+1;?>號
    <img src="./icon/03D02.png" alt="">
    <input class="chk" type="checkbox" value="<?=$i;?>">
</div>
<?php endfor;?>

<div>
    您選擇的電影是：<?=$_POST['name'];?><br>
    您選擇的時刻是：<?=$_POST['date'];?> <?=$_POST['session'];?><br>
    已經勾選X張票，最多可以購買4張票<br>
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
    })

    function checkout(){
        data.seat = seat;

        $.post('./api/checkout.php', data, function(res){
            $('$mm').html(res);
        })
    }
</script>