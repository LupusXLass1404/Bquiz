<div class="ct">
    <h2>忘記密碼</h2>
    <hr>
    <div>
        請輸入信箱以查詢密碼<br>
        <input type="text" name="email" id="email">
    </div>
    <div id="pw"></div>
    <div>
        <button onclick="get_pw()">尋找</button>
    </div>
</div>

<script>
    function get_pw(){
        $.post("./api/check_email.php", {email: $('#email').val()}, function(res){
            // console.log(res);
            if(res){
                $("#pw").html(`您的密碼為：${res}`);
            } else {
                $("#pw").html(`查無此資料`);
            }
        })
    }
</script>




