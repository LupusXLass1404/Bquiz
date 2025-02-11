<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    </marquee>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <h2 class="cent">更多最新消息顯示區</h2>
    <hr>
    <?php
        $item = 5;
        $page = $_GET['page'] ?? 1;
        $start = ($page - 1) * $item;
    ?>
    <ol class="ssaa" style="list-style-type:decimal;" start="<?=$start + 1;?>">
        <?php
            $rows = $News -> all(" limit $start, ${item}");
            foreach($rows as $row):     
        ?>
        <li><?=mb_substr($row['text'],0, 20);?>...<span class="all" style="display: none;"><?=$row['text'];?></span></li>
        <?php
            endforeach;
        ?>
    </ol>
    <div style="text-align:center; font-size:24px;">
        <style>
            .nowPage{
                font-size: 3rem;
            }
        </style>
        <?php 
            if($page > 1){
                echo " <a class='bl' href='?do={$_GET['do']}&page=" . $page - 1 . "'> < </a> ";
            }

            $num = ceil(($News -> count()) / $item);
            for ($i=1; $i <= $num; $i++){
                $nowPage = ($page == $i) ? "nowPage" : "";
                echo " <a class='{$nowPage} bl' href='?do={$_GET['do']}&page={$i}'> {$i} </a> ";
            }

            if($page < $num){
                echo " <a class='bl' href='?do={$_GET['do']}&page=" . $page + 1 . "'> > </a> ";
            }
        ?>
    </div>
</div>
<div id="altt"
    style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
    $(".ssaa li").hover(
        function () {
            console.log('tt');
            $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
            $("#altt").show()
        }
    )
    $(".ssaa li").mouseout(
        function () {
            $("#altt").hide()
        }
    )
</script>