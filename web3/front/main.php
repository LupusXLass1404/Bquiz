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
    show(move);
    let silder = setInterval(()=>{
        show(move);
    }, 3000);

    
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
                item.slideUp(1000,function(){
                    itemNext.slideDown(1000);
                })
                break;
            case 3:
                // 放大縮小
                item.hide(1000,function(){
                    itemNext.show(1000);
                })
                break;
            default:
                // 淡入淡出
                item.fadeOut(1000,function(){
                    itemNext.fadeIn(1000);  
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

<style>
    .movies{
        display: flex;
        flex-wrap:wrap;
    }
    .movie {
        width: 50%;
        font-size: 14px;
    }
    input[type='button'] {
        font-size: 14px;
        padding: 1px;
    }
</style>
<div class="half">
    <h1>院線片清單</h1>
    <?php 
        $today = date('Y-m-d');
        $ondate = date('Y-m-d', strtotime("-2 days"));

        $num = 4;
        $page = $_GET['page'] ?? 1;
        $start = ($page - 1) * $num;
        $rows = $Movie -> all(['sh'=>1], " AND ondate BETWEEN '$ondate' And '$today' Order by `rank` Limit $start, $num") 
    ;?>
    <div class="rb tab" style="width:95%;">
        <div class="movies">
            <?php foreach($rows as $row): ?>
                <div class="movie">
                    <table>
                        <tr>
                            <td class="ct">
                                <a href="?do=datail&id=<?=$row['id'];?>"><img src="./upload/<?=$row['poster'];?>" alt="" width=100%></a>
                            </td>
                            <td width=60%>
                                <?=$row['name']?><br>
                                分級：<?=DB::$rating[$row['rating']];?> <img src="./icon/03C0<?=$row['rating'];?>.png" alt="" style="vertical-align: middle; width: 24px;"><br>
                                上映日期：<br><?=$row['ondate'];?>
                                <hr>
                                <input type="button" value="劇情介紹" onclick="location.href='?do=datail&id=<?=$row['id'];?>'">
                                <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?=$row['id'];?>'">
                            </td>
                        </tr>
                    </table>
                </div>
                
            <?php endforeach; ?>
        </div>
        <div class="ct a">
            <?php
                if($page > 1) echo "<a href='?page=".($page-1)."'> &lt </a>";

                $limit = ceil($Movie -> count(['sh'=>1], " AND ondate BETWEEN '$ondate' AND '$today'") / $num);
                for($i = 1; $i <= $limit; $i++) {
                    $now = $page == $i ? '24' : '16';
                    echo "<a href='?page=$i' style='font-size: {$now}px'> $i </a>";
                }

                if($page < $limit) echo "<a href='?page=".($page+1)."'> &gt </a>";
            ?>
        </div>
    </div>
</div>

   