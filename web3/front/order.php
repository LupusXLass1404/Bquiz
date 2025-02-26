<div id="ticket" class="tab ct clo">
    <table class="aut">
        <tr>
            <td class="ct">電影：</td>
            <td>
                <select name="movie" id="movie">
                    
                </select>
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
                <select name="schedule" id="schedule">

                </select>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="button" value="確定" onclick="next()">
        <input type="button" value="重置">
    </div>
</div>

<div id="seat" class="tab ct clo" style="display: none">
    <h2>選座位</h2>
    <div class="ct">
        <input type="button" value="上一步" onclick="next()">
        <input type="button" value="訂購">
    </div>
</div>

<script>
    let getId = '<?=$_GET['id']??'';?>';
    getMoive(getId);
   
    $('#date').on('change', function(){
        getSchedule($('#date').val());
    })

    function getMoive(id){
        $.post('./api/get_movie.php', {id}, function(res){
            $('#movie').html(res);
            getDate($('#movie').val());
        })
    }

    function getDate(movie){
        $.post('./api/get_date.php', {movie}, function(res){
            $('#date').html(res);
            getSchedule($('#date').val());
        })
    }

    function getSchedule(date){
        $.post('./api/get_schedule.php', {date}, function(res){
            console.log(res);
            $('#schedule').html(res);
        })
    }

    function next(){
        $('#ticket, #seat').toggle();
    }
</script>