<div class="ct tab aut order" id="order">
    <table>
        <tr>
            <td class="clo ct">電影：</td>
            <td>
                <select name="movie" id="movie">

                </select>
            </td>
        </tr>
        <tr>
            <td class="clo ct">日期：</td>
            <td>
                <select name="date" id="date">

                </select>
            </td>
        </tr>
        <tr>
            <td class="clo ct">場次：</td>
            <td>
                <select name="session" id="session">

                </select>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="button" value="確定" onclick="get_seat()">
        <input type="button" value="重置">
    </div>
</div>

<div id="next">
    
</div>

<script>
    let getId="<?=$_GET['id']??0;?>";
    get_movie();
    
    $('#movie').on('change', function(){
        get_date();
    })
    $('#date').on('change', function(){
        get_session();
    })

    function get_movie(){
        $.post('./api/get_movie.php', {id: getId},function(res){
            $('#movie').html(res);

            get_date();
        })    
    }
    function get_date(){
        $.post('./api/get_date.php', {movie:$("#movie").val()},function(res){
            $('#date').html(res);
            
            get_session();
        })
    }
    function get_session(){
        $.post('./api/get_session.php', {movie: $('#movie').val(), date: $('#date').val()},function(res){
            console.log(res);
            $('#session').html(res);
        })
    }

    let data = {};
    function get_seat(){
        
        data = {
            movie: $('#movie option:selected').text(),
            date: $('#date').val(),
            session: $('#session').val()
        };
        $.post('./api/get_seat.php', data,function(res){
            $('#next').html(res);
            $('#order, #next').toggle();
        })
    }
    function prev(){
        $('#order, #next').toggle();
    }
    let seat = [];

    function booking(){
        data.seat=seat;
        data.qt=seat.length;
        $.post('./api/booking.php', data,function(res){
            $('#mm').html(res);
        })
    }
   
</script>