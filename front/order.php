<style>
    table,tr,td{
        border: 2px solid white;
    }
    td>select{
        width: 80%;
    }
    .order{
        width: 60%; 
        margin: auto;
    }
    .booking{
        width: 60%; 
        margin: auto;
        display: none;
    }
    .seat-list td{
        height: 100px;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<div class="rb" style="padding: 10px;">
    <fieldset class="order">
        <legend>線上訂票</legend>
        <table class="all ct">
            <tr>
                <td style="width: 30%;">電影:</td>
                <td>
                    <select class="movie-id">
                        <?php
                        $today = date('Y-m-d');
                        $upDate = date('Y-m-d', strtotime('-2 days'));
                        $movies = $Movie->sql("select * from `movie` where `date`>='$upDate'&&`date`<='$today'&&`display`=1 order by `no` asc");
                        foreach($movies as $movie){
                            $state = "";
                            if(isset($_GET['id']) && $_GET['id']==$movie['id']) $state = "selected";
                            echo "<option value='{$movie['id']}' $state>{$movie['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>日期:</td>
                <td>
                    <select class="movie-date">

                    </select>
                </td>
            </tr>
            <tr>
                <td>場次</td>
                <td>
                    <select class="movie-time">

                    </select>
                </td>
            </tr>
        </table>
        <div class="ct">
            <button class="order-btn">確定</button>
            <button class="reset-btn">重置</button>
        </div>
    </fieldset>

    <form class="booking" action="./api/booking.php" method="post">
        <div class="seat-list">
            <table class="all ct">
                <?php
                for($i=1; $i<=4; $i++){
                    echo "<tr>";
                    for($j=1; $j<=5; $j++){
                        echo "<td id='$i-$j' style='background-image: url(./icon/03D02.png);'></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="booking-info">
            <div>您選擇的電影是:<span class="select-name"></span></div>
            <div>您選擇的時刻是:<span class="select-time"></span></div>
            <div>您已勾選<span class="select-count"></span>張票，最多可購買4張票</div>
        </div>
        <div class="ct">
            <input type="button" class="back-btn" value="上一步">
            <input type="submit" value="訂購">
        </div>
    </form>
</div>

<script>
    const getDate = (movieId) => {

    }
    const getTime = (movieId) => {
        
    }
    const checkSeat = (movieId) => {

    }

    $('.order-btn').on('click', () => {
        $('.booking').show();
        $('.order').hide();
    });
    $('.reset-btn').on('click', () => {
        $('.movie-id').prop('selectedIndex', 0);
        $('.movie-date').prop('selectedIndex', 0);
        $('.movie-time').prop('selectedIndex', 0);
    });
    $('.back-btn').on('click', () => {
        $('.booking').hide();
        $('.order').show();
    });
</script>