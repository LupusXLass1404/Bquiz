<h1>會員註冊</h1>
<form action="./api/reg.php" method="post">
<p>姓名：<input type="text" name="name" id=""></p>
<p>帳號：<input type="text" name="acc" id="acc"><input type="button" onclick="check_acc()" value="檢測帳號"></p>
<p>密碼：<input type="password" name="pw" id=""></p>
<p>電話：<input type="text" name="tel" id=""></p>
<p>住址：<input type="text" name="address" id=""></p>
<p>電子信箱：<input type="text" name="email" id=""></p>
<p>
    <input type="submit" value="註冊">
    <input type="reset" value="重置">
</p>
</form>

<script>
    function check_acc(){
        let acc = $('#acc').val();
        $.post("./api/check_acc.php", {acc}, function(res){
            console.log(res);
            if(res>0 || acc=='admin'){
                alert('帳號重覆');
            } else {
                alert('帳號可以使用');
            }
        })
    }
</script>