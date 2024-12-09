<div class="di"
    style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <table width="100%">
        <tbody>
            <tr>
                <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a
                        href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a>
                </td>
                <td><button onclick="document.cookie=&#39;user=&#39;;location.replace(&#39;?&#39;)"
                        style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
            </tr>
        </tbody>
    </table>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli">校園映象資料管理</p>
        <form method="post" action="./api/edit.php?table=<?=$do?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="45%">校園映象資料圖片</td>
                        <td width="7%">顯示</td>
                        <td width="7%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                        $div=3;
                        $total=$$Do->count();
                        $pages=ceil($total/$div);
                        $now=$_GET['p']??1;
                        $start=($now-1)*$div;

                        $rows=$$Do->all(" limit $start, $div");
                        foreach($rows as $row){  
                    ?>
                    <tr>
                        <td>
                            <img src="./upload/<?=$row['img'];?>" style="width: 100px; height: 80px;">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"
                                <?=($row['sh'] == 1)?'checked':''?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                        <td>
                            <input type="button"
                                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload_<?=$do?>.php?id=<?=$row['id'];?>&#39;)"
                                value="更換圖片">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </tr>
                    <?php
                        };
                    ?>

                </tbody>
            </table>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px"><input type="button"
                                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do?>.php?do=<?=$do?>&#39;)"
                                value="新增校園映象圖片"></td>
                        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="cent">
                <?php
                    if(($now-1)>0){
                        $prev=$now-1;
                        echo "<a href='?do=$do&p=$prev'>&lt;</a>";
                    }
                    
                    for($i=1; $i<=$pages; $i++){
                        echo "<a href='?do=$do&p=$i'> ";
                        echo $i;
                        echo " </a>";
                    }

                    if(($now+1) <= $pages){
                        $next=$now+1;
                        echo "<a href='?do=$do&p=$next'>&gt;</a>";
                    }
                ?>
            </div>
        </form>
    </div>
</div>