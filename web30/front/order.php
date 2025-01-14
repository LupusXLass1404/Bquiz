<style>
.order-table{
    width: 50%;
    margin: auto;
}
.order-table td{
    border: 1px solid #000;
    padding: 4px;
    background-color: #bbb;
}

.order-table select{
    width: 100%;
}
#booking *{
    box-sizing: border-box;
}
</style>
<div id="order">
    <h3 class="ct">線上訂票</h3>
    <form action="" method="post">
        <table class="ct order-table">
            <tr>
                <td width=20%>電影：</td>
                <td>
                    <select name="movie" id="movie">
                    
                    </select>            
                </td>
            </tr>
            <tr>
                <td>日期：</td>
                <td>
                    <select name="date" id="date"></select>
                </td>
            </tr>
            <tr>
                <td>場次：</td>
                <td>
                    <select name="session" id="session"></select>
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <input type="button" value="確定" onclick="booking()">
                    <input type="reset" value="重置">
                </td>
                <!-- <td></td> -->
            </tr>
        </table>
    </form>
</div>

<div id="booking" style="display:none">


</div>

<script>
    getMovies();
    let id = new URLSearchParams(location.href).get('id');

    $('#movie').on("change", function(){
        getDays();
    })
    $('#date').on("change", function(){
        getSessions();
    })

    function getMovies(){
        $.get("./api/get_movies.php", function(movies){
            // console.log(movies);
            $("#movie").html(movies);

            if(parseInt(id) > 0){
                $(`#movie option[value = '${id}']`).prop('selected', true);
            }

            getDays();
        })
    }

    function getDays(){
        $.get("./api/get_days.php", {'movie': $('#movie').val()}, function(days){
            // console.log(days);
            $('#date').html(days);

            getSessions();
        })
    }

    function getSessions(){
        $.get("api/get_sessions.php", {'movie': $('#movie').val(), 'date': $('#date').val()}, function(sessions){
            // console.log(sessions);
            $('#session').html(sessions);
        })
    }

    function booking(){
        movie = {
            id: $('#movie').val(),
            name: $('#movie option:selected').text(),
            date: $('#date').val(),
            session: $('#session').val()
        }

        $.get("./api/booking.php", movie, function(booking){
            $("#booking").html(booking)
            $("#booking,#order").toggle();
        })
        
        // $('#booking').html(`${movie.id}, ${movie.date}, ${movie.name}, <button onclick="$('#order, #booking').toggle()">上一步</button>`)

    }
</script>