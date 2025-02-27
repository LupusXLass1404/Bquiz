
<div id="ticket" class="tab ct clo">
    <table class="aut">
        <tr>
            <td class="ct">電影：</td>
            <td>
                <select name="movie" id="movie"></select>
            </td>
        </tr>
        <tr>
            <td class="ct">日期：</td>
            <td>
                <select name='date' id="date"></select>
            </td>
        </tr>
        <tr>
            <td class="ct">場次：</td>
            <td>
                <select name="schedule" id="schedule"></select>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="button" value="確定" onclick="next()">
        <input type="button" value="重置">
    </div>
</div>

<div id="seat" class="tab ct clo" style="display: none">
    
</div>


<script>
    let data = {};
    let getId = '<?=$_GET['id']??'';?>';
    getMoive(getId);
   
    $('#movie').on('change', function(){
        getDate($('#movie').val());
    })
    $('#date').on('change', function(){
        getSchedule($('#date').val());
    })

    function getMoive(id){
        $.post('./api/get_movie.php', {id}, function(res){
            $('#movie').html(res);
            data['movie'] = $('#movie option:selected').text();

            getDate(data['movie']);
        })
    }

    function getDate(movie){
        $.post('./api/get_date.php', {movie}, function(res){
            $('#date').html(res);
            data['date'] = $('#date').val();

            getSchedule(data);
        })
    }

    function getSchedule(date){
        $.post('./api/get_schedule.php', date, function(res){
            // console.log(res);
            $('#schedule').html(res);
            data['schedule'] = $('#schedule').val();
        })
    }
    
    function next(){
        $.post('./api/get_seat.php', data, function(res){
            $('#seat').html(res);

            $('#ticket, #seat').toggle();
        })
    }
    function prev(){
        $('#ticket, #seat').toggle();
    }
</script>