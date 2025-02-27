<?php include_once "./db.php";


$rows = $Ticket -> all($_POST);
$seat = [];
foreach($rows as $row){
    $tmp = unserialize($row['seat']);
    $seat = array_merge($seat,$tmp);;
}
?>
<div class="seats aut">
    <?php for($i=1 ;$i <= 20; $i++): ;?>
        <div class="seat">
            <?=ceil($i/5);?>排-<?=($i-1)%5+1;?>號<br>
            <?php if(in_array($i ,$seat)): ?>
                <img src="./icon/03D03.png" alt="">
            <?php else: ?>
                <img src="./icon/03D02.png" alt="">
                <input type="checkbox" name="seat[]" class="seatChk" value="<?=$i;?>">
            <?php endif; ?>
        </div>
    <?php endfor; ?>
</div>
<div class="ct">
    您選擇的電影是：<?=$_POST['movie'];?><br>
    您選擇的時刻是：<?=$_POST['date'];?> <?=$_POST['schedule'];?><br>
    您已勾選<span id="getTicket">0</span>張票，最多可以購買4張票。
</div>
<div class="ct">
    <input type="button" value="上一步" onclick="prev()">
    <input type="button" value="訂購" onclick="checkout()">
</div>

<script>
    let seat = [];
    $('.seatChk').on('change', function(){
        if($(this).prop('checked')){
            if(seat.length >= 4){
                $(this).prop('checked', false);
                alert('最多只能選4張票！');
            } else {
                seat.push($(this).val());
            }         
        } else {
            seat.splice(seat.indexOf($(this).data('seat')),1);
        }
        $('#getTicket').text(seat.length);
    })

    function checkout(){
        data['seat'] = seat;
        $.post('./api/ticket.php', data, function(res){  
            $('#seat').html(res);
        })
    }
</script>

