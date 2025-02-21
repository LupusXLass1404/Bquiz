<fieldset class="tab aut">
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="forget"></div>
    <div><button onclick="forget()">尋找</button></div>
</fieldset>

<script>
    function forget(){
        let email = $('#email').val();
        
        $.post('./api/forget.php', {email}, function(res){
            $('#forget').html(res);
        })
        resetForm();
    }
</script>