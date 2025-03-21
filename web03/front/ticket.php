<div id="ticket">
    <table class="aut clo" width=50%>
        <tr>
            <td>電影：</td>
            <td ><select name="movie" id="movie"></select></td>
        </tr>
        <tr>
            <td>日期：</td>
            <td ><select name="date" id="date"></select></td>
        </tr>
        <tr>
            <td>場次：</td>
            <td><select name="session" id="session"></select></td>
        </tr>
    </table>
    <div class="ct">
        <input type="button" value="確定" onclick="next()">
        <input type="button" value="重置">
    </div>
</div>



<div id="seats" class="seats" style="display: none;">

</div>

<script>
    let getId = <?=$_GET['id']??0;?>;
    let data = {};
    let seat = [];

    getMovie(getId);

    $('#movie').on('change', function(){
        getDate();
    })
    $('#date').on('change', function(){
        getSession();
    })

    function getMovie(id){
        $.post('./api/get_movie.php', {id}, function(res){
            // console.log(res);
            
            $('#movie').html(res);
            getDate();
        })
    }
    function getDate(){
        data.movie = $('#movie').val();
        
        $.post('./api/get_date.php', data, function(res){
            // console.log(res);
            
            $('#date').html(res);
            getSession();
        })
    }
    function getSession(){
        data.date = $('#date').val();
        
        $.post('./api/get_session.php', data, function(res){
            // console.log(res);
            
            $('#session').html(res);
        })
    }

    function next(){
        data.name = $('#movie option:selected').text();
        data.session = $('#session').val();

        $.post('./api/get_seat.php', data, function(res){
            // console.log(res);
            
            $('#seats').html(res);
            $('#ticket, #seats').toggle();

        })
    }

    function prev(){
        $('#ticket, #seats').toggle();
    }

</script>