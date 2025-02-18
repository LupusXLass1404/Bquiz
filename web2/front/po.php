<?php
    $type = $_GET['type'] ?? "1";
?>
<fieldset class="tab aut">
    <legend>目前位置：首頁 > 分類網誌 > <?=DB::$type[$type];?></legend>

    <div class="tags">
        <h3>分類網誌</h3>
        <button class="tag" onclick="to('?do=po&type=1')">健康新知</button>
        <button class="tag" onclick="to('?do=po&type=2')">菸害防治</button>
        <button class="tag" onclick="to('?do=po&type=3')">癌症防治</button>
        <button class="tag" onclick="to('?do=po&type=4')">慢性病防治</button>
    </div>
    <hr>

    <?php
        $rows = $News -> all(['type'=> $type]);
        if(isset($_GET['id'])){
            $row = $News -> find($_GET['id']);
            echo "<pre>{$row['text']}</pre>";
        } else {
            echo "<h3>文章列表</h3>";
            foreach($rows as $row){
                echo "<a href='?do=po&type={$type}&id={$row['id']}'>{$row['title']}</a><br>"; 
            }
        }
    ?>
</fieldset>

