<fieldset class="tab aut">
    <legend>會員登入</legend>
    <table class="tab aut">
        <tr>
            <td class="clo">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button>
                <button onclick="resetForm()">清除</button>
            </td>
            <td>
                <a href="?do=forget">忘記密碼</a>|
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function login(){
        let data = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
        }
        
        $.post('./api/login.php', data, function(res){
            if(res == "acc") {
                alert('查無帳號');
            } else if(res == "pw"){
                alert('密碼錯誤');
            } else {
                if(res == "admin") {
                    location.href = './admin.php';
                } else {
                    location.href = './index.php';
                }
            }
            resetForm()
        })
    }
</script>