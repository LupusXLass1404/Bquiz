<?php
    $row = $Order -> find($_GET['id']);
?>

<h2 class="ct">訂單編號的<span style="color: red;"><?=$row['no'];?></span>詳細資料</h2>
<table class="all">
    <tr>
        <td class="tt ct" width=30%>會員帳號</td>
        <td class="pp"><?=$row['acc'];?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?=$row['name'];?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?=$row['email'];?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><?=$row['addr'];?></td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp"><?=$row['tel'];?></td>
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
        foreach(unserialize($row['cart']) as $id => $qt):
            $item = $Item -> find($id);
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
    總價：<?=$row['total'];?>
</div>
<div class="ct">
    <button onclick="location.href='?do=order'">返回</button>
</div>
