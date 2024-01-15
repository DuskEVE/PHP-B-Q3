<style>
    .lists{
        width: 200px;
        height: 240px;
        position: relative;
        left: 114px;
        overflow: hidden;
    }
    .item *{
        box-sizing: border-box;
    }
    .item{
        width: 200px;
        height: 240px;
        margin: auto;
        position: absolute;
        box-sizing: border-box;
        display: none;
    }
    .item div img{
        width: 100%;
        height: 220px;
    }
    .item div{
        text-align: center;
    }
    .left, .right{
        width: 0;
        border: 20px solid black;
        border-top-color: transparent;
        border-bottom-color: transparent;
    }
    .left{
        border-left-width: 0;
    }
    .right{
        border-right-width: 0;
    }
    .controls{
        width: 420px;
        height: 100px;
        position: relative;
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .btns{
        width: 360px;
        height: 100px;
        display: flex;
        overflow: hidden;
    }
    .btn img{
        width: 60px;
        height: 80px;
    }
    .btn{
        width: 90px;
        font-size: 12px;
        text-align: center;
        flex-shrink: 0;
        position: relative;
    }
    .movies{
        display: flex;
        flex-wrap: wrap;
    }
    .movie{
        box-sizing: border-box;
        display: flex;
        flex-wrap: wrap;
        padding: 5px;
        margin: 0.5%;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 48%;
    }
</style>

<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">

            <div class="lists">
                <?php
                $posters = $Poster->searchAll(['display'=>1], "order by rank");
                foreach($posters as $poster){
                ?>
                <div class="item" data-ani="<?=$poster['ani']?>">
                    <div><img src="./img/<?=$poster['img']?>"></div>
                    <div><?=$poster['name']?></div>
                </div>
                <?php
                }
                ?>
            </div>

            <div class="controls">
                <div class="left"></div>
                <div class="btns">
                    <?php
                    foreach($posters as $poster){
                    ?>
                    <div class="btn">
                        <div><img src="./img/<?=$poster['img']?>"></div>
                        <div><?=$poster['name']?></div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="right"></div>
            </div>

        </div>
    </div>
</div>

<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movies">
        <?php
        $today = date('Y-m-d');
        $ondate = date('Y-m-d', strtotime('-2 days'));
        $movies = $Movie->sql("select * from `movie` where `ondate`>='$ondate' && `ondate`<='$today' && `display`=1 order by `rank`");
        $total = count($movies);

        $div = 4;
        $page = ceil($total/$div);
        $currentPage = 1;
        if(isset($_GET['p'])) $currentPage = $_GET['p'];
        $start = 0;
        if($currentPage > 1) $start = ($currentPage-1)*$div;
        $end = ($currentPage>=$page? $total:$start+4);

        for($i=$start; $i<$end; $i++){
            $data = $movies[$i];
        ?>

        <div class="movie">
            <div style="width:40%;">
                <img src="./img/<?=$data['poster']?>" style="width: 60px; border: 3px solid white">
            </div>
            <div style="width:60%;">
                <div><?=$data['name']?></div>
                <div style="font-size: 14px;">分級:<img src="./icon/03C0<?=$data['level']?>.png" style="width: 20px;"></div>
                <div style="font-size: 14px;">上映日期:<?=$data['ondate']?></div>
                <div>
                    <button onclick="location.href='./index.php?do=intro&id=<?=$data['id']?>'">劇情簡介</button>
                    <button onclick="location.href='./index.php?do=order&id=<?=$data['id']?>'">線上訂票</button>
                </div>
            </div>
        </div>

        <?php
        }
        ?>
        </div>
        
        <div class="ct">
        <?php
        
        for($i=1; $i<=$page; $i++){
            if($i == $currentPage) echo "<span style='font-size:24px; margin: 3px;'>$i</span>";
            else echo "<a href='./index.php?do=main&p=$i' style='font-size:16px; margin: 3px;'>$i</a>";
        }
        ?>
        </div>

    </div>
</div>

<script>
    let position = 0;
    let total = $('.btn').length;
    let p = 0;
    let timer = setInterval(() => {slide()}, 3000);
    let now = 0;
    
    $('.item').eq(0).show();

    function slide(){
        let ani = $('.item').eq(now).data('ani');
        console.log(ani);
        if(ani === 1){
            $('.item').eq(now).fadeOut(1000, () => {
                now = (now === total-1? 0:now+1);
                $('.item').eq(now).fadeIn(1000);
            });
        }
        else if(ani === 2){
            $('.item').eq(now).hide(1000, () => {
                now = (now === total-1? 0:now+1);
                $('.item').eq(now).show(1000);
            });
        }
        else if(ani === 3){
            $('.item').eq(now).slideUp(1000, () => {
                now = (now === total-1? 0:now+1);
                $('.item').eq(now).slideDown(1000);
            });
        }

        // $('.item').hide();
        // if(now+1 < total) now += 1;
        // else now = 0;
        // $('.item').eq(now).show();
    }

    $('.left,.right').on('click', (event) => {
        let dir = $(event.target).attr('class');

        if(dir==='left' && position-1 >= 0){
            position -= 1;
        }
        else if(dir==='right' && position+1 <= total-4){
            position += 1;
        }

        $('.btn').animate({right:90*position});
    });
</script>