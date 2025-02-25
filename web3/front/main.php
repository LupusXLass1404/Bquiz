<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <?php $rows = $Trailer -> all(['sh'=>1], " Order by `rank`") ;?>
    <div class="rb tab ct" style="width:95%;">
        
        <div id="abgne-block-20111227">
            <div class="main">
                <?php foreach($rows as $row): ?>
                    <div class="poster" data-ani="<?=$row['ami'];?>"><img src="./upload/<?=$row['img'];?>"><br><?=$row['name'];?></div>
                <?php endforeach; ?>
            </div>
            <div class="bottom">
                <div class="sub">
                    <div class="arr">
                        <img src="./icon/left.jpg" onclick="ani('-')">
                    </div>
                    <div class="list">
                        <?php foreach($rows as $idx => $row): ?>
                            <div class="item" onclick="moveChange(<?=$idx;?>)" data-ani="<?=$row['ami'];?>">
                                <img src="./upload/<?=$row['img'];?>"><br><?=$row['name'];?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="arr">
                        <img src="./icon/right.jpg" onclick="ani('+')">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let total = $('.item').length;
    let move = 0;
    
    let silder = setInterval(()=>{
        show(move);
    }, 1500);

    
    function moveChange(p){
        move = p;
        $('.poster').stop(true, true);
        show(p);

    }

    function show(p){
        let next = move+1 < total ? move+1 : '0'
        let item = $('.poster').eq(move)
        let itemNext = $(".poster").eq(next);
        let ani = $('.poster').eq(move).data('ani');
        $('.poster').hide();
        item.show();
        switch (ani) {
            case 2:
                // 滑入滑出
                item.slideUp(500,function(){
                    itemNext.slideDown(500);
                })
                break;
            case 3:
                // 放大縮小
                item.hide(500,function(){
                    itemNext.show(500);
                })
                break;
            default:
                // 淡入淡出
                item.fadeOut(500,function(){
                    itemNext.fadeIn(500);  
                });
                break;
        }
        
        move+1 < $('.item').length ? move++ : move=0;
        // console.log(ani);
    }

    let n = 0;
    function ani(arr){
        let right = $('.item').css('right');
     
        if((n + 4 < total && arr == '+') || (n > 0 && arr == '-')){
            n = (arr == "+") ? ++n : --n;
            console.log(n);
            $('.item').animate({
                right: `${arr}=88`
            }, 500); 
        }
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

   