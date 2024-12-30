<fieldset>
    <legend>忘記密碼</legend>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td id="pw"></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="尋找" onclick="findPw()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
function findPw() {
    let email = $('#email').val();

    $.get("./api/forgot.php", {
        'email': `${email}`
    }, (res) => {
        console.log(email);
        console.log(res);
        console.log(JSON.parse(res));
        // print_r(res);

        // if () {
        //     $('#pw').html(`您的密碼為`);
        // } else {
        //     $('#pw').html(`查無此資料`);
        // }
    })

}
</script>