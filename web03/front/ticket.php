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

<script>
    let getId = <?=$_GET['id']??0;?>;
    getMovie(getId)
    function getMovie(id){
        $.post('./api/get_movie.php', {id}, function(res){
            console.log(res);
            
            $('#movie').html(res);
        })
    }
    function getDate(){

    }
    function getSession(){

    }

</script>