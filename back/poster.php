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

<div style="width: 100%; height: 190px; overflow: auto">
    <?php
    $datas = $Poster->searchAll();
    foreach($datas as $index=>$data){
    ?>
    <div class="item">
        <div>
            <img src="./img/<?=$data['img']?>" style="height: 90px;">
        </div>
        <div>
            <input type="text" name="name[]" value="<?=$data['name']?>">
        </div>
        <div>
            <input type="button" value="往上">
            <input type="button" value="往下">
        </div>
        <div>
            <input type="checkbox" name="display[]" value="<?=$data['id']?>" <?=($data['display']==1? "checked":"")?>>顯示
            <input type="checkbox" name="del[]" value="<?=$data['id']?>">刪除
            <select name="ani">
                <option value="1">淡入淡出</option>
                <option value="2">收縮</option>
                <option value="3">滑入滑出</option>
            </select>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<div>

</div>

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