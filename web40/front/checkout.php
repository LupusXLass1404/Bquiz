<?php 
    $user = $Mem -> find(['acc' => $_SESSION['Mem']]);
?>

<h2 class="ct">填寫資料</h2>
<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?=$user['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?=$user['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?=$user['email'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?=$user['addr'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?=$user['tel'];?>"></td>
    </tr>
    
</table>

<table class="all">
    <tr class="tt ct">
            <td>商品名稱</td>
            <td>編號</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <?php
        $total = 0;
        foreach($_SESSION['cart'] as $id => $qt):
            $item = $Item -> find($id);
            $total += intval($item['price']*$qt);
        ?>
        <tr class="pp">
            <td><?=$item['name'];?></td>
            <td class="ct"><?=$item['no'];?></td>
            <td class="ct"><?=$qt;?></td>
            <td class="ct"><?=$item['price'];?></td>
            <td class="ct"><?=$item['price']*$qt;?></td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
<div class="ct all tt" style="padding:8px 0">
    總價：<?=$total;?>
</div>
<div class="ct">
    <button onclick="checkout()">確定送出</button>
    <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>

<script>
    function checkout(){   
        let data = {
            name: $('#name').val(),
            email: $('#email').val(),
            addr: $('#addr').val(),
            tel: $('#name').val(),
            total:<?=$total;?>
        }    

        $.post('./api/checkout.php', data, function(res){
            console.log(res);
            
            alert('訂購成功\n感謝您的選購');
            location.href='./index.php';
        })
    }
</script>