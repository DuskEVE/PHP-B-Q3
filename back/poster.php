<style>
    .item{
        display: flex;
        padding: 3px;
        margin: 3px;
        justify-content: space-between;
        align-items: center;
    }
    .item div{
        width: 24.5%;
        margin: 0 0.25%;
        text-align: center;
    }
</style>

<div>
    <h3 class="ct">預告片清單</h3>
</div>

<div style="display: flex; justify-content: space-around;">
    <div class="ct" style="width: 24%; margin:5px 0 5px 0; background-color: gray">預告片海報</div>
    <div class="ct" style="width: 24%; margin:5px 0 5px 0; background-color: gray">預告片片名</div>
    <div class="ct" style="width: 24%; margin:5px 0 5px 0; background-color: gray">預告片排序</div>
    <div class="ct" style="width: 24%; margin:5px 0 5px 0; background-color: gray">操作</div>
</div>

<form action="./api/edit_poster.php" method="post">
    <div style="width: 100%; height: 190px; overflow: auto">

        <?php
        $datas = $Poster->searchAll([], "order by `rank` asc");
        foreach($datas as $index=>$data){
        ?>
        <div class="item" data-id="<?=$data['id']?>">
            <div>
                <img src="./img/<?=$data['img']?>" style="height: 90px;">
            </div>
            <div>
                <input type="text" name="name[]" value="<?=$data['name']?>">
            </div>
            <div>
                <input class="btn" type="button" value="往上" 
                   data-now="<?=$data['id']?>" 
                    data-to="<?=($index==0? $data['id']:$datas[$index-1]['id'])?>" data-table="<?=$_GET['do']?>">
                <input class="btn" type="button" value="往下" 
                   data-now="<?=$data['id']?>" 
                    data-to="<?=($index==count($datas)-1? $data['id']:$datas[$index+1]['id'])?>" data-table="<?=$_GET['do']?>">
            </div>
            <div>
                <input type="checkbox" name="display[]" value="<?=$data['id']?>" <?=($data['display']==1?"checked":"")?>>顯示
                <input type="checkbox" name="del[]" value="<?=$data['id']?>">刪除
                <select name="ani[]">
                    <option value="1" <?=($data['ani']==1?"selected":"")?>>淡入淡出</option>
                    <option value="2" <?=($data['ani']==2?"selected":"")?>>收縮</option>
                    <option value="3" <?=($data['ani']==3?"selected":"")?>>滑入滑出</option>
                </select>

                <input type="hidden" name="id[]" value="<?=$data['id']?>">
            </div>
        </div>
        <?php
        }
        ?>"
    </div>

    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>

<hr>
<div>
    <h3 class="ct">新增預告片海報</h3>

    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <table class="ts">
            <tr>
                <td class="ct">預告片海報:</td>
                <td class="ct"><input type="file" name="poster" id="poster"></td>
                <td class="ct">預告片片名:</td>
                <td class="ct"><input type="text" name="name" id="name"></td>
            </tr>
        </table>

        <div class="ct">
            <input type="submit" value="送出">
            <input type="reset" value="重置">
        </div>
    </form>
</div>

<script>
    $(".btn").on('click', (event) => {
        let now = $(event.target).data('now');
        let to = $(event.target).data('to');
        let table = $(event.target).data('table');
        // let item = $(`.item[data-id='${now}']`);
        // let targetItem = $(`.item[data-id='${to}']`);

        $.post("./api/switch.php", {now, to, table}, () => {
            location.reload();
        });
        // $.post("./api/switch.php", {now, to, table});
        // temp = item.html();
        // item.html(targetItem.html());
        // targetItem.html(temp);
    })
</script>