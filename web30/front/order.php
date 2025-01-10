<style>
.order-table{
    width: 50%;
    margin: auto;
}
.order-table td{
    border: 1px solid #000;
    padding: 4px;
    background-color: #bbb;
}

.order-table select{
    width: 100%;
}
</style>
<h3 class="ct">線上訂票</h3>
<form action="" method="post">
    <table class="ct order-table">
        <tr>
            <td width=20%>電影：</td>
            <td>
                <select name="movie" id="movie">
                <?php
                $today = date("Y-m-d");
                $ondate = date("Y-m-d", strtotime("-2 day"));

                $rows = $Movie -> all(['sh' => 1], " AND ondate BETWEEN '$ondate' AND '$today' order by rank");
                foreach($rows as $row):
                ?>
                <option value="<?=$row['id']?>" <?=$row['id'] == ($_GET['id'] ?? '') ? "selected" : "";?>><?=$row['name']?></option>

                <?php
                endforeach;
                ?>

                </select>            
            </td>
        </tr>
        <tr>
            <td>日期：</td>
            <td>
                <select name="date" id="date"></select>
            </td>
        </tr>
        <tr>
            <td>場次：</td>
            <td>
                <select name="session" id="session"></select>
            </td>
        </tr>
        <tr>
            <td colspan=2>
                <input type="button" value="確定">
                <input type="reset" value="重置">
            </td>
            <!-- <td></td> -->
        </tr>
    </table>
</form>