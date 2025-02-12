<div class="ct">
    <h2>會員登入</h2>
    <hr>
    <div>
        帳號：<input type="text" name="acc" id="acc">
    </div>
    <div>
        密碼：<input type="password" name="pw" id="pw">
    </div>
    <div>
        <button onclick="login()">登入</button>
        <button onclick="reset()">清除</button>
        <a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a>
    </div>
</div>

<script>
    
    function login(){
        $.post("./api/check_login.php", {acc: $('#acc').val(), pw: $('#pw').val()}, function(res){
            console.log(res);
            if(res == "acc") alert('查無帳號');
            if(res == "pw") alert('密碼錯誤'); 
            if(res == "admin") to('./admin.php');
            if(res == "login") to('./index.php');
            reset();
        })
    }
    
    function reset(){
        $('input').val('');
    }
</script>

