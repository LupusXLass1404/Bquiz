<div class="ct">
    <h2>會員註冊</h2>
    <hr>
    <font color=red>*請設定您要註冊的帳號及密碼（最長12個字元）*</font>
    <div>
        Step1：登入帳號<input type="text" name="acc" id="acc">
    </div>
    <div>
        Step2：登入密碼<input type="password" name="pw" id="pw">
    </div>
    <div>
        Step3：再次確認密碼<input type="password" name="pw2" id="pw2">
    </div>
    <div>
        Step4：信箱（忘記密碼時使用）<input type="text" name="email" id="email">
    </div>
    <div>
        <button onclick="reg()">註冊</button>
        <button onclick="reset()">清除</button>
    </div>
</div>

<script>
    function reg(){
        let data = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            email: $('#email').val(),
        }
        let pw2 = $('#pw2').val();
        // console.log(data);
        
        if(data.acc && data.pw && data.email && pw2){
            if (data.pw == pw2){
                $.post("./api/reg.php", data, function(res){
                    console.log(res);
                    if(res){
                        alert('註冊成功，歡迎加入');
                        to("?do=login");
                    } else {
                        alert('帳號重複');
                    }
                })
            } else {
                alert('密碼錯誤')
            }
        } else {
            alert('不可空白')
        }
    }

    function reset(){
        $('input').val('');
    }
</script>


