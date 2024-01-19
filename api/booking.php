<?php
include_once "./db.php";
$movie = $Movie->search(['id'=>$_GET['movie_id']]);
$date = $_GET['date'];
$session = $_GET['session'];

$orders = $Order->searchAll(['movie'=>$movie['name'], 'date'=>$date, 'session'=>$session]);
$seats = [];
foreach($orders as $order){
    $temp = unserialize($order['seats']);
    $seats = array_merge($seats, $temp);
}
?>

<style>
    #room{
        background-image: url('./icon/03D04.png');
        background-position: center;
        background-repeat: none;
        width: 540px;
        height: 370px;
        margin: auto;
        box-sizing: border-box;
        padding: 19px 112px 0 112px;
    }
    .seats{
        display: flex;
        flex-wrap: wrap;
    }
    .seat{
        width: 63px;
        height: 85px;
        position: relative;
    }
    .chk{
        position: absolute;
        right: 2px;
        bottom: 2px;
    }
</style>

<div id="room">
    <div class="seats">
        <?php
        for($i=0; $i<20; $i++){
            $row = floor($i/5)+1;
            $num = $i%5 + 1;
            $seat = (in_array($i, $seats)? "03D03.png":"03D02.png");
            echo "
                <div class='seat'>
                    <div class='ct'>
                        {$row}排{$num}號
                    </div>
                    <div class='ct'>
                        <img src='./icon/$seat'>
                    </div>
                    <input type='checkbox' name='chk' value='$i' class='chk'>
                </div>
            ";
        }
        ?>
    </div>
</div>

<div>您選擇的電影是:<?=$movie['name']?></div>
<div>您選擇的時刻是:</div>
<div>您已經勾選<span id="tickets"></span>張選票，最多可以購買四張票</div>
<div>
    <button onclick="$('#select').show('#booking').hide()">上一步</button>
    <button>訂購</button>
</div>
<div></div>
<div></div>

<script>
    let seats = [];

    $('.chk').on('change', (event) => {
        if($(event.target).prop('checked')){
            if(seats.length+1 <= 4) seats.push($(event.target).val());
            else{
                $(event.target).prop('checked', false);
                alert('每個人只能勾選四張票');
            }
        }
        else seats.splice(seats.indexOf($(this).val()), 1);
        $('#tickets').text(seats.length);
    });
    function checkOut(){
        let json = {movie:'<?=$movie['name']?>',
                    date:'<?=$date?>',
                    session:'<?=$session;?>',
                    qt:seats.length,
                    seats
                };
        $.post('./api/checkout.php', json, (no) => {
            location.href = `?do=result&no=${no}`;
        })
    }
</script>