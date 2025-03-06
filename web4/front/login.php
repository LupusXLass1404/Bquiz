<?php
if(isset($_SESSION['mem'])){
    to('./index.php');
}
?>
<h3>第一次購物</h3>
<img src="./icon/0413.jpg" onclick="lof('?do=reg')">
<h3>會員登入</h3>
<p>帳號：<input type="text" name="acc" id="acc"></p>
<p>密碼：<input type="password" name="pw" id="pw"></p>
<?php
$a=rand(10,99);
$b=rand(10,99);
$ans=$a+$b;
?>
<p>驗證碼：<?=$a;?> + <?=$b;?>=<input type="text" name="ans" id="ans"></p>
<input type="button" value="確認" onclick="login()">
<script>
    function login(){
        let data = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
        }
        let ans = <?=$ans;?>;
        if($('#ans').val()==ans){
            $.post('./api/login.php?do=mem',data,function(res){
                // console.log(res);
                
                location.reload();
            })
        } else {
            alert('對不起，您輸入的驗證碼有誤請您重新輸入')
        }
    }
</script>