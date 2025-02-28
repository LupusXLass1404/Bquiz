<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <?php $rows = $Poster->all(['sh'=>1], 'Order by `rank`'); ?>
            <div id="posters" class="aut">
                <?php foreach($rows as $row): ?>
                    <div class="poster ct aut" data-ani="<?=$row['ani'];?>">
                        <img src="./upload/<?=$row['img'];?>" alt=""  style="height:260px">
                        <br><?=$row['name'];?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="box">
                <div>
                    <img src="./icon/left.jpg" alt="" onclick="move('left')">
                </div>
                <div id="items">
                    <?php foreach($rows as $row): ?>
                    <div class="item ct" style="padding-left: 8px">
                        <img src="./upload/<?=$row['img'];?>" alt="" width=80px><?=$row['name'];?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <img src="./icon/right.jpg" alt="" onclick="move('right')">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let num = 0;
    let l = $('.poster').length;
    let int = setInterval(()=> {anishow(num)}, 3000);
    anishow(num);

    function anishow(n){
        let now = $('.poster').eq(n);
        let next = $('.poster').eq(n+1);
        let ani = now.data('ani');

        $('.poster').hide();
        now.show();

        switch (ani) {
            case 2:
                now.slideUp(1000, function(){
                    next.slideDown(1000);
                });
                break;
            case 3:
                now.hide(1000, function(){
                    next.show(1000);
                });
                break;
            default:
                now.fadeOut(1000, function(){
                    next.fadeIn(1000);
                });
                break;
        }

        if(num < l-1){
            num++;
        } else {
            num = 0;
        }

        if(int == 0){
            int = setInterval(()=> {anishow(num)}, 1500);
        }
    }

    $('.item').on('click', function(){
        console.log(123);

        num = $(this).index();
        clearInterval();
        $('.poster').stop();
        anishow(num);
    })

    let p = 0;
    let end = $('.item').length - 4;
    function move(arr){
        if(arr == 'left' && p > 0) p--;
        if(arr == 'right' && p < end) p++;

        $('.item').animate({right: p*88});
    }
</script>


<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
    </div>
</div>