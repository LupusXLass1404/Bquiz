<h1 class="ct">填寫資料</h1>

<?php $mem=$Mem->find(['acc'=>$_SESSION['mem']]); ?>
<table class="tab aut" width=100%>
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp" id="acc"><?=$mem['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="address" id="address" value="<?=$mem['address'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel'];?>"></td>
    </tr>
</table>

<table class="tab aut" width=100%>
    <tr class="ct tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    if(isset($_SESSION['buy'])):
    foreach($_SESSION['buy'] as $id=>$qt):
        $row=$Good->find($id);
        $total = $row['price']*$qt;
    ?>
        <tr class="ct pp">
            <td><?=$row['no'];?></td>
            <td><?=$row['name'];?></td>
            <td><?=$qt;?></td>
            <td><?=$row['stock'];?></td>
            <td><?=$row['price'];?></td>
            <td><?=$row['price']*$qt;?></td>
        </tr>
    <?php
    endforeach;
    endif;
    ?>
</table>
<p class="ct">
    總價：<span id="total"><?=$total;?></span>
</p>
<p class="ct">
    <input type="button" value="確定送出" onclick="checkout()">
    <input type="button" value="返回修改訂單" onclick="lof('?do=buycart')">
</p>
<script>
    function checkout(){
        let data = {
            acc: $('#acc').text(),
            name: $('#name').val(),
            email: $('#email').val(),
            address: $('#address').val(),
            tel: $('#tel').val(),
            total: $('#total').text(),
        };
        $.post('./api/checkout.php', data, function(res){
            console.log(res);
            alert('訂購成功，感謝您的選購');
            lof('./index.php');
        })
    }
</script>