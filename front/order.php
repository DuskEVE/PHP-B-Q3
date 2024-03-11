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
    td>div{
        margin-top: -45px;
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
                        echo "
                        <td id='$i-$j' style='background-image: url(./icon/03D02.png);'>
                            <div><input class='check-btn' type='checkbox' name='seat[]' value='$i-$j'>$i 排 - $j 號</div>
                        </td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="booking-info">
            <div>您選擇的電影是:<span class="select-name"></span></div>
            <div>您選擇的時刻是:<span class="select-time"></span></div>
            <div>您已勾選<span class="select-count">0</span>張票，最多可購買4張票</div>
            <input type="hidden" id="name" name="name" value="">
            <input type="hidden" id="movie_id" name="movie_id" value="">
            <input type="hidden" id="date" name="date" value="">
            <input type="hidden" id="time" name="time" value="">
            <input type="hidden" id="count" name="count" value="0">
        </div>
        <div class="ct">
            <input type="button" class="back-btn" value="上一步">
            <input type="submit" value="訂購">
        </div>
    </form>
</div>

<script>
    const getDate = () => {
        let id = $('.movie-id').val();
        $.get('./api/get_movie_date.php', {id}, (response) => {
            $('.movie-date').html(response);
            getTime(id);
        });
    };
    const getTime = () => {
        let id = $('.movie-id').val();
        let date = $('.movie-date').val();
        $.get('./api/get_movie_time.php', {id, date}, (response) => {
            $('.movie-time').html(response);
        })
    };
    const checkSeat = (movie_id, date, time) => {
        $.get('./api/get_order.php', {movie_id, date, time}, (response) => {
            let seats = JSON.parse(response);
            seats.forEach(seat => {
                $(`#${seat}`).css({'background-image': 'url(./icon/03D03.png)'});
                $(`#${seat}`).find('input').remove();
            });
        });
    };

    $('.order-btn').on('click', () => {
        let index = $('.movie-id').prop('selectedIndex');
        let movie_id = $('.movie-id').val();
        let date = $('.movie-date').val();
        let time = $('.movie-time').val();
        let name = $('.movie-id').children().eq(index).text();
        $('.booking').show();
        $('.order').hide();
        $('.select-name').text(name);
        $('.select-time').text(date+' | '+time);
        $('#name').val(name);
        $('#movie_id').val(movie_id);
        $('#date').val(date);
        $('#time').val(time);
        checkSeat(movie_id, date, time)
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
    $('.movie-id').on('change', getDate);
    $('.movie-date').on('change', getTime);
    $('.check-btn').on('change', (event) => {
        if($('.check-btn:checked').length > 4) $(event.target).prop('checked', false);
        $('#count').val($('.check-btn:checked').length);
        $('.select-count').text($('.check-btn:checked').length);
    });

    getDate();
</script>