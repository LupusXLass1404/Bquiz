<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php?do=<?=$_GET['do'];?>">
        <table class="cent" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="23%">最新消息資料內容</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php
                    $item = 5;
                    $page = $_GET['page'] ?? 1;
                    $start = ($page - 1) * $item;

                    $rows = $$db -> all(" limit $start, ${item}");
                    foreach($rows as $row):
                ?>
                <tr>
                    <td>
                        <textarea name="text[]" id="text" style="width: 95%"><?=$row['text'];?></textarea>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>

                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php
                    endforeach;
                ?>
                </tr>
            </tbody>
        </table>
        <div class="cent">
            <style>
                .nowPage{
                    font-size: 2rem;
                }
            </style>
            <?php 
                if($page > 1){
                    echo " <a href='?do={$_GET['do']}&page=" . $page - 1 . "'> < </a> ";
                }

                $num = ceil(($$db -> count()) / $item);
                for ($i=1; $i <= $num; $i++){
                    $nowPage = ($page == $i) ? "nowPage" : "";
                    echo " <a class='{$nowPage}' href='?do={$_GET['do']}&page={$i}'> {$i} </a> ";
                }

                if($page < $num){
                    echo " <a href='?do={$_GET['do']}&page=" . $page + 1 . "'> > </a> ";
                }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$_GET['do'];?>.php?do=<?=$_GET['do'];?>&#39;)" value="新增最新消息資料">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>