<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <ul class="lists">
            </ul>
            <ul class="controls">
            </ul>
        </div>
    </div>
</div>

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
        $pageCount = ceil($Movie->count(['display'=>1]) / 4);
        $now = (isset($_GET['p'])?$_GET['p']:1);
        $start = ($now-1) * 4;
        $end = $start + 4;
        if($now == $pageCount) $end = $Movie->count(['display'=>1]);

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
                    <button>劇情簡介</button>
                    <button>線上訂票</button>
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