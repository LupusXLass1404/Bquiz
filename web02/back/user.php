<fieldset class="tab aut">
    <legend>帳號管理</legend>
    <form action="./api/edit.php?do=<?=$do;?>" method="post">
        <table class="tab aut ct">
            <tr class="clo">
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php foreach($$db->all() as $row): ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=  str_repeat("*", strlen($row['pw'])) ;?></td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                </td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="ct">
            <input type="submit" value="確認刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>      
    <h2>新增會員</h2>
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
        <button onclick="reg()">新增</button>
        <button onclick="resetReg()">清除</button>
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
					alert('新增成功');
					location.reload();
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
