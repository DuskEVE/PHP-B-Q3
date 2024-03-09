<style>
    .movie-list{
        width: 100%;
        height: 360px;
        overflow-y: auto;
        color: black;
    }
    .movie-info{
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .movie-info>div{
        padding: 3px;
    }
</style>
<div class="rb" style="padding: 10px; width: 98%; height: 480px;">
    <div class="ts lg" style="padding: 5px;">
        <div><button onclick="location.href='?do=add_movie'">新增電影</button></div>
        <hr>
        <div class="movie-list">
            <table class="all">
                <?php
                $movies = $Movie->searchAll();
                foreach($movies as $movie){
                    $level = $Level->search(['id'=>$movie['level']]);
                ?>
                <tr style="border: 2px solid black; background-color: white;">
                    <td style="width: 10%;"><img src="./img/<?=$movie['poster']?>" style="height: 100px;"></td>
                    <td style="width: 10%;">
                        <span style="margin: auto;">分級:<img src="./icon/<?=$level['img']?>" style="width: 20px;"></span>
                    </td>
                    <td class="movie-info">
                        <div>
                            片名:<?=$movie['name']?> | 片長:<?=$movie['length']?> | 上映時間:<?=$movie['date']?>
                        </div>
                        <div>
                            <button>顯示</button>
                            <button>往上</button>
                            <button>往下</button>
                            <button>編輯電影</button>
                            <button>刪除電影</button>
                        </div>
                        <div><?=$movie['intro']?></div>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>