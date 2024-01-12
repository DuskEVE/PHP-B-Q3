<style>
    .item div{
        box-sizing: border-box;
        color: black;
    }
    .item{
        background-color: white;
        width: 100%;
        display: flex;
        padding: 3px;
        box-sizing: border-box;
        margin: 3px 0;
    }
    .item > div:nth-child(1){
        width: 15%;
    }
    .item > div:nth-child(2){
        width: 15%;
    }
    .item > div:nth-child(3){
        width: 70%;
    }
</style>

<button onclick="location.href='./admin.php?do=add_movie'">新增電影</button>
<hr>

<div style="width: 100%; height:410px; overflow:auto;">
    <?php
    $datas = $Movie->searchAll([], ' order by rank');
    foreach($datas as $index=>$data){
    ?>

    <div class="item">
        <div><img src="./img/<?=$data['poster']?>" style="width: 100%;"></div>
        <div>分級:<img src="./icon/03C0<?=$data['level']?>.png"></div>
        <div>

            <div style="display: flex; width: 100%">
                <div style="width: 33%;">
                    片名:<?=$data['name']?>
                </div>
                <div style="width: 33%;">
                    片長:<?=$data['length']?>
                </div>
                <div style="width: 33%;">
                    上映時間:<?=$data['ondate']?>
                </div>
            </div>

            <div>
                <button class="display-btn" data-id="<?=$data['id']?>"><?=$data['display']==1? "顯示":"隱藏"?></button>
                <button class="switch-btn" data-id="<?=$data['id']?>" 
                      data-to="<?=(($index==0? $data['id']:$datas[$index-1]['id']))?>" 
                   data-table="movie">往上</button>
                <button class="switch-btn" data-id="<?=$data['id']?>" 
                      data-to="<?=(($index==count($datas)-1? $data['id']:$datas[$index+1]['id']))?>" 
                   data-table="movie">往下</button>
                <button class="edit-btn" data-id="<?=$data['id']?>">編輯電影</button>
                <button class="del-btn" data-id="<?=$data['id']?>" data-table="movie">刪除電影</button>
            </div>

            <div>
                <?=$data['intro']?>
            </div>

        </div>
    </div>

    <?php
    }
    ?>
</div>

<script>
    $('.display-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        $.post('./api/display.php', {id}, () => {
            $(event.target).text($(event.target).text()==='顯示'? '隱藏':'顯示');
        });
    });
    $('.switch-btn').on('click', (event) => {
        let now = $(event.target).data('id');
        let to = $(event.target).data('to');
        let table = $(event.target).data('table');

        $.post("./api/switch.php", {now, to, table}, () => {
            location.reload();
        });
    });
    $('.edit-btn').on('click', (event) => {
        let id = $(event.target).data('id');
    });
    $('.del-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        let table = $(enent.target).data('table');
        $.post('./api/del.php', {id, table});
    });

</script>