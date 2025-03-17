<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <div class="shows">
                <?php
                    $rows = $Poster->all(['sh'=>1], "Order by `rank`");
                    foreach($rows as $idx=>$row):
                ?>
                <div class="show" data-ani="<?= $row['ani'];?>">
                        <img src="./upload/<?= $row['poster'];?>" alt="" height=280px>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="wrapper">
                <div class="arrow">
                    <img src="./icon/left.jpg" alt="" onclick="move('left')">
                </div>
                <div class="links">
                    <?php
                        foreach($rows as $idx=>$row):
                    ?>
                    <div class="link">
                        <a href="#" onclick="now('<?= $idx;?>')">
                            <img src="./upload/<?= $row['poster'];?>" alt="" width=80px>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="arrow">
                    <img src="./icon/right.jpg" alt="" onclick="move('right')">
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    let nowl = 0;
    let maxl = $('.link').length - 4;
    let nows = 1; 
    let maxs = $('.link').length;
    $('.show').eq(0).show();

    setInterval("show(nows)", 2500);

    function now(idx){
        $('.show').stop();
        nows = idx;
        $('.show').hide();
        show(idx);
    }

    function show(idx){
        let prev = $('.show').eq(idx==0 ? maxs-1 : idx-1);
        let now = $('.show').eq(idx);
        let ani = prev.data('ani');

        switch (ani) {
            case 2:
                prev.slideUp(1000,function(){
                    $('.show').hide();
                    now.slideDown(1000);
                })
                break;
            case 3:
                prev.hide(1000,function(){
                    $('.show').hide();
                    now.show(1000);
                })
                break;
            default:
                prev.fadeOut(500,function(){
                    $('.show').hide();
                    now.fadeIn(500);
                })
                break;
        }

        nows++;
        if(nows >= maxs){
            nows = 0;
        }
    }

    function move(arrow){
        
        if(arrow=='right' && nowl < maxl) ++nowl
        if(arrow=='left' && nowl > 0) --nowl

        $('.link').animate({right: `${nowl*88}px`}, 300);
        // $('.link').css('right', `${nowl*88}px`);

    }

</script>

<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movies">
            <?php
                $item=4;
                $page=$_GET['page']??1;
                $start=$item*($page-1);

                $today=date("Y-m-d");
                $ondate=date("Y-m-d", strtotime("$today - 2 days"));
                // 
                $rows= $Movie -> all(['sh'=>1], " AND `ondate` Between '$ondate' AND '$today' Order by `rank` limit $start, $item");
                foreach($rows as $idx=>$row):
            ?>
            <table class="movie">
                <tr>
                    <td width=32%><img src="./upload/<?= $row['poster'];?>" alt="" width=90%></td>
                    <td>
                        <?=$row['name'];?>
                        <br>
                        分級：<img src="./icon/03C0<?=$row['rating'];?>.png" alt=""> <?=DB::$rating[$row['rating']];?>
                        <br>
                        上映日期：<br><?=$row['ondate'];?>
                        <br>
                        <input type="button" value="劇情簡介" onclick="lof('?do=intro&id=<?=$row['id'];?>')">
                        <input type="button" value="線上訂票" onclick="lof('?do=order&id=<?=$row['id'];?>')">
                    </td>
                </tr>
                
            </table>
            <?php endforeach; ?>
        </div>
        <p>

            <div class="ct a">
                    <?php
                    $n = $Movie -> count(['sh'=>1], "AND `ondate` Between '$ondate' AND '$today' Order by `rank`");
                    $end = ceil($n/$item);
                    for($i=1; $i<=$end; $i++){
                        echo "<a href='?page=$i'> $i </a>";
                    };
                    ?>
            </div>
        </p>
    </div>
</div>