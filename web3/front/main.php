<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <?php $rows = $Trailer -> all(['sh'=>1]) ;?>
    <div class="rb tab ct" style="width:95%;">
        
        <div id="abgne-block-20111227">
            <ul class="main">
            </ul>
            <div class="bottom">
                <div>
                    <img src="./icon/left.jpg" onclick="ani('-')">
                </div>
                <div class="list">
                    <?php foreach($rows as $row): ?>
                        <div class="item"><img src="./upload/<?=$row['img'];?>"><br><?=$row['name'];?></div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <img src="./icon/right.jpg" onclick="ani('+')">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function ani(arr){
        console.log('ani');
        
        $('.item').animate({
            right: `${arr}=88px`
        }, 500); 
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

   