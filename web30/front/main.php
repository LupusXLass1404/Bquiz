<style>
  .poster-block *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  .poster-block{
    width: 420px;
    height: 400px;
  }
  .lists{
    width: 210px;
    height: 280px;
    margin: auto;
    /* background-color: red; */
    position: relative;
  }
  .controls{
    /* width: 100%; */
    display: flex;
    height: 100px;
    /* background-color: blue; */
    align-items: center;
    justify-content: space-around;
  }

  .icons{
    width: 320px;
    display: flex;
    list-style: none;
    padding: 0;
    overflow: hidden;
  }

  .icons li{
    width: 80px;
    flex-shrink: 0;
  }
  .icons img{
    width: 80%;
  }

  .poster{
    position: absolute;
    display: none;
  }

  .poster img{
    width: 100%;
    height: 250px;
  }

  .poster span{
    font-size: 18px;
  }

  .left, .right{
    height: 0;
    border: 25px solid transparent;
    border-radius: 4px;
  }

  .left{
    border-right-color:#fff;
    
  }
  .right{
    border-left-color:#fff;
  }
</style>
<div id="mm">
  <div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
      <div id="poster-block">
        <div class="lists">
          <?php 
            $posters = $Poster -> all(['sh' => 1], "order by rank");
            foreach($posters as $idx => $poster):
          ?>
          <div class="poster ct">
              <img src="./upload/<?=$poster['img']?>" alt=""><br>
              <span><?=$poster['name']?></span>
          </div>

          <?php
            endforeach;
          ?>
        </div>
        <div class="controls">
          <div class="left"></div>
          <ul class="icons">
          <?php 
            foreach($posters as $idx => $poster):
          ?>
          <li>
              <img src="./upload/<?=$poster['img']?>" alt="">
          </li>
          <?php
            endforeach;
          ?>
          </ul>
          <div class="right"></div>
        </div>
      </div>
    </div>
  </div>

<script>
  poster_show(0);
  function poster_show(i){
    $('.poster').eq(i).show();
  }
</script>


  <div class="half">
    <h1>院線片清單</h1>
    <?php
    $today = date("Y-m-d");
    $ondate = date("Y-m-d", strtotime("-2 day"));

    $all = $Movie -> count(['sh' => 1], " AND ondate BETWEEN '$ondate' AND '$today'");
    $div = 4;
    $pages = ceil($all / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;

    $rows = $Movie -> all(['sh' => 1], " AND ondate BETWEEN '$ondate' AND '$today' order by rank limit $start,$div");
    // dd($rows);
    ?>
    <div class="rb tab" style="width:95%;">
      <div style="display: flex; flex-wrap: wrap;">
        <?php
        foreach($rows as $row):
        ?>
        <div style="width: 47%; height: 170px; padding: 0.5%; margin: 0.5%; border: 1px solid #fff;">
          <table>
            <tr>
              <td colspan=2>
                片名：<?=$row['name'];?>
              </td>
              <!-- <td></td> -->
            </tr>
            <tr>
              <td width=50%>
                <img src="./upload./<?=$row['poster'];?>" alt="" width=100%>
              </td>
              <td>
                分級：<br>
                <img src="./icon/03C0<?=$row['level'];?>.png" style="width:20px;vertical-align:middle">
                <?=$Movie::$level[$row['level']];?>
                <hr>
                上映日期：<?=$row['ondate'];?>
              </td>
            </tr>
            <tr>
              <td>
                <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button>
              </td>
              <td>
                <button onclick="location.href='?do=order&id=<?=$row['id']?>'">線上訂票</button>
              </td>
            </tr>
          </table>
        </div> 
        <?php
        endforeach;
        ?>
      </div>
      <style>
        .main-link a{
          color: #fff;
        }
      </style>
      <div class="ct main-link">
      <?php 
      if(($now-1)>0){
          echo "<a href='?p=".($now-1)."'> &lt </a>";
      }

      for($i=1;$i<=$pages;$i++){
          $fontsize=($i==$now)?'24px':'18px';
          echo "<a href='?p=$i' style='font-size:$fontsize'>$i</a>";
      }

      if(($now+1)<=$pages){
          echo "<a href='?p=".($now+1)."'> &gt </a>";
      }
      ?>
      </div>
    </div>
  </div>
</div>