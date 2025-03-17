<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <?php $rows=$Poster->all(['sh'=>1], " order by `rank`");?>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <div class="shows">
                <?php foreach($rows as $row):?>
                    <div class="show ct">
                        <img src="./upload/<?=$row['poster'];?>" alt="" height=260px><br>
                        <?=$row['name'];?>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="wrapper">
                <div class="arrow">
                    <img src="./icon/left.jpg" onclick="move('left')">
                </div>
                <div class="links">
                    <?php foreach($rows as $idx=>$row):?>
                        <div class="link ct" onclick="nows(<?=$idx;?>)">
                            <img src="./upload/<?=$row['poster'];?>" alt="" width=80px><br>
                            <?=$row['name'];?>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="arrow">
                    <img src="./icon/right.jpg" onclick="move('right')">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let now_link = 0;
    let max_link = $('.link').length - 4;
    function move(arrow){
        if(arrow=='left' && now_link>0) now_link--
        if(arrow=='right' && now_link<max_link) now_link++

        $('.link').animate({right:`${now_link*88}px`},200);

    }

    let now_show = 1;
    let max_show = $('.link').length;

    setInterval("show(now_show)", 1500);

    $('.show').eq(0).show();
    function show(id){
        let prev_eq=id==0?max_show-1:id-1
        let prev = $('.show').eq(prev_eq);
        console.log(prev_eq);

        let now = $('.show').eq(id);

        prev.fadeOut(500,function(){
            $('.show').hide();
            now.fadeIn(500);
        })

        if(now_show >= max_show-1){
            now_show=0;
        } else {
            now_show++;
        }
    }
    function nows(now){
        $('.show').stop();
        now_show = now;
        $('.show').hide();
        show(now_show);
    }
</script>


<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> 456</tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>