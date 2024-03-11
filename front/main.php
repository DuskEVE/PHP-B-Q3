<style>
    .poster{
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .poster>img{
        height: 70%;
    }
    .controls{
        height: 100px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .poster-btn{
        height: 90%;
        width: 0px;
    }
    .poster-btn.on{
        width: auto;
        margin: 3px;
    }
    .right-btn{
        border-top: 25px solid transparent;
        border-bottom: 25px solid transparent;
        border-left: 25px solid black;
        border-right: 25px solid transparent;
    }
    .left-btn{
        border-top: 25px solid transparent;
        border-bottom: 25px solid transparent;
        border-left: 25px solid transparent;
        border-right: 25px solid black;
    }
</style>

<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <?php
            $posters = $Poster->searchAll(['display'=>1], "order by `no` asc");
            ?>
            <img class="poster-img" src="./img/<?=$posters[0]['img']?>" data-next="<?=$posters[1]['id']?>">
        </div>
        <div class="controls">
            <div class="left-btn"></div>

            <?php

            for($i=0; $i<count($posters); $i++){
                $poster = $posters[$i];
                $state = ($i>3?"":"on");
                $next = ($i==count($posters)-1?$posters[0]:$posters[$i+1]);
                $perv = ($i==0?$posters[count($posters)-1]:$posters[$i-1]);
                echo "<img class='poster-btn poster-{$poster['id']} $state' src='./img/{$poster['img']}' 
                    data-id='{$poster['id']}' data-next='{$next['id']}' data-perv='{$perv['id']}'>";
            }
            ?>

            <div class="right-btn"></div>
        </div>
    </div>
</div>

<script>
    const switchPoster = (targetId) => {
        let target = $(`.poster-${targetId}`);
        let id = target.data('id');
        let perv = target.data('perv');
        let next = target.data('next');
        let src = target.attr('src');
        let img = `<img class="poster-img" src="${src}" data-id="${id}" data-next="${next}" data-parv="${perv}">`;

        $('.poster').fadeTo(750, 0.1, () => {
            $('.poster').empty().append(img);
        }).fadeTo(750, 1);
    };
    const resetAuto = () => {
        clearInterval(auto);
        auto = setInterval(() => {
        let next = $('.poster-img').data('next');
        switchPoster(next);
        }, 4000);
    };

    let auto = setInterval(() => {
        let next = $('.poster-img').data('next');
        switchPoster(next);
    }, 4000);

    $('.poster-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        switchPoster(id);

        clearInterval(auto);
        resetAuto();
    });
    $('.left-btn').on('click', () => {
        if($('.poster-btn').first().hasClass('on')) return
        $('.on').eq(3).animate({width:'0px'}).removeClass('on');
        $('.on').eq(0).prev().animate({width:'82px'}).addClass('on');
    });
    $('.right-btn').on('click', () => {
        if($('.poster-btn').last().hasClass('on')) return
        $('.on').eq(3).next().animate({width:'82px'}).addClass('on');
        $('.on').eq(0).animate({width:'0px'}).removeClass('on');
    });
</script>

<style>
    .movie-list{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-content: center;
    }
    .movie-item{
        width: 48%;
        height: 180px;
        display: flex;
        border: 1px solid black;
        margin: 2px;
        font-size: 14px;
    }
    .movie-img{
        width: 30%;
        display: flex;
        align-items: center;
    }
    .movie-info{
        width: 70%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .movie-info>div{
        margin-top: 3px;
    }
</style>

<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab movie-list" style="width:95%;">
        <?php
        $today = date('Y-m-d');
        $upDate = date('Y-m-d', strtotime('-2 days'));
        $movies = $Movie->sql("select * from `movie` where `date`>='$upDate'&&`date`<='$today'&&`display`=1 order by `no` asc");
        $pageCount = 1;
        if(count($movies)) $pageCount = ceil(count($movies) / 4);
        $now = (isset($_GET['p'])?$_GET['p']:1);
        $start = ($now-1) * 4;
        $end = $start + 4;
        if($now == $pageCount) $end = count($movies);

        for($i=$start; $i<$end; $i++){
            $movie = $movies[$i];
            $level = $Level->search(['id'=>$movie['level']])
        ?>
        <div class="movie-item">
            <div class="movie-img">
                <img src="./img/<?=$movie['poster']?>" style="width: 100%;">
            </div>
            <div class="movie-info">
                <div><?=$movie['name']?></div>
                <div>分級:<img src="./icon/<?=$level['img']?>" style="width: 20px;"></div>
                <div>上映日期:<?=$movie['date']?></div>
                <div>
                    <button onclick="location.href='?do=intro&id=<?=$movie['id']?>'">劇情簡介</button>
                    <button onclick="location.href='?do=order&id=<?=$movie['id']?>'">線上訂票</button>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="ct">
        <?php
        if($now > 1){
            $perv = $now-1;
            echo "<a href='?p=$perv'><</a>";
        }
        for($i=1; $i<=$pageCount; $i++){
            $fontSize = ($now==$i?"22px":"16px");
            echo "<a href='?p=$i' style='font-size:$fontSize; margin: 3px;'>$i</a>";
        }
        if($now < $pageCount){
            $next = $now+1;
            echo "<a href='?p=$next'>></a>";
        }
        ?>
    </div>
</div>