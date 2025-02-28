<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <div id="posters">1</div>
            <div id="box">
                <div>
                    <img src="./icon/left.jpg" alt="" onclick="move('left')">
                </div>
                <div id="items">
                    <?php
                        $rows = $Poster->all(['sh'=>1], 'Order by `rank`');
                        foreach($rows as $row):
                    ?>
                    <div class="item" style="padding-left: 8px">
                        <img src="./upload/<?=$row['img'];?>" alt="" width=80px>
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
    let p = 0;
    let end = $('.item').length - 4;
    function move(arr){
        if(arr == 'left' && p > 0) p--;
        if(arr == 'right' && p < end) p++;

        // console.log('123');
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