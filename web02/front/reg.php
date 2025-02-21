<fieldset class="tab aut">
    <legend>會員註冊</legend>
    <span style="color: red;">* 請設定您要註冊的帳號及密碼（最長12個字元）</span>
    <table>
        <tr>
            <td class="clo">Step1: 登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2: 登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3: 再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4: 信箱（忘記密碼時使用）</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div>
        <button onclick="reg()">註冊</button>
        <button onclick="resetForm()">清除</button>
    </div>
</fieldset>

<script>
    function reg() {
	let data = {
		acc: $('#acc').val(),
		pw: $('#pw').val(),
		email: $('#email').val()
	}
	let pw2 = $('#pw2').val();

	if (data.acc && data.pw && data.email && pw2) {
		if (data.pw == pw2) {
			$.post('./api/reg.php', data, function (res) {
				if(res){
					alert('帳號重複');
				} else {
					alert('註冊成功');
					lof('?do=login');
				}
			})
		} else {
			alert('密碼錯誤');
		}
	} else {
		alert('不可空白');
	}
}
</script>