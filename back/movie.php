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
                $movies = $Movie->searchAll([], "order by `no` asc");
                foreach($movies as $index=>$movie){
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
                            <button class="display-btn" data-id="<?=$movie['id']?>"><?=$movie['display']==1?"隱藏":"顯示"?></button>
                            <button class="switch-btn" data-id="<?=$movie['id']?>" data-target="<?=$index==0?$movies[0]['id']:$movies[$index-1]['id']?>">往上</button>
                            <button class="switch-btn" data-id="<?=$movie['id']?>" data-target="<?=$index==(count($movies)-1)?$movies[count($movies)-1]['id']:$movies[$index+1]['id']?>">往下</button>
                            <button onclick="location.href='?do=edit_movie&id=<?=$movie['id']?>'">編輯電影</button>
                            <button class="del-btn" data-id="<?=$movie['id']?>">刪除電影</button>
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

<script>
$('.switch-btn').on('click', (event) => {
    let id = $(event.target).data('id');
    let target = $(event.target).data('target');

    $.get('./api/switch_movie.php', {id, target}, () => location.reload());
})
$('.display-btn').on('click', (event) => {
    let id = $(event.target).data('id');
    let target = $(event.target);

    $.get('./api/display_movie.php', {id}, (response) => target.text(response));
})
$('.del-btn').on('click', (event) => {
    let id = $(event.target).data('id');

    $.post('./api/del_movie.php', {id}, () => location.reload());
})
</script>