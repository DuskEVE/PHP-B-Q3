<style>
    .lg{
        background-color: lightgray;
    }
    .wh{
        background-color: white;
    }
    .poster-list{
        max-height: 200px;
        overflow-y: scroll;
        color: black;
    }
    .poster{
        width: auto;
        max-height:100px;
        margin: auto;
    }
</style>

<div class="rb" style="padding-bottom: 10px;">
    <div class="ts lg">
        <div class="ct rb">
            <h3>預告片清單</h3>
        </div>

        <form action="./api/update_poster.php" method="post">
            <table class="all ct" style="color: black;">
                <tr>
                    <td style="width: 30%;">預告片海報</td>
                    <td style="width: 30%;">預告片片名</td>
                    <td style="width: 20%;">預告片排序</td>
                    <td style="width: 18%;">操作</td>
                </tr>
            </table>
            <div class="poster-list">
                <table class="all ct">
                    <?php
                    $posters = $Poster->searchAll([], "order by `no` asc");
                    foreach($posters as $poster){
                    ?>
                    <tr class="wh">
                        <input type="hidden" name="id[]" value="<?=$poster['id']?>">
                        <td style="width: 30%;">
                            <img class="poster" src="./img/<?=$poster['img']?>">
                        </td>
                        <td style="width: 30%;">
                            <input type="text" name="name[]" value="<?=$poster['name']?>" style="width: 80%;">
                        </td>
                        <td style="width: 20%;">
                            <input type="button" value="往上">
                            <input type="button" value="往下">
                        </td>
                        <td style="width: 18%;">
                            <input type="checkbox" name="display[]">顯示 
                            <input type="checkbox" name="del[]">刪除
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="ct">
                <input type="submit" value="確定編輯">
                <input type="reset" value="重置">
            </div>
        </form>
    </div>

    <hr>

    <div class="ts">
        <div class="ct">
            <h3>新增預告片海報</h3>
        </div>
        <div class="ts lg">
            <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
                <table class="all ct" style="color: black;">
                    <tr>
                        <td>預告片海報:</td>
                        <td><input type="file" name="file" style="width: 80%;"></td>
                    </tr>
                    <tr>
                        <td>預告片片名:</td>
                        <td><input type="text" name="name" style="width: 80%;"></td>
                    </tr>
                </table>
                <div class="ct">
                    <input type="submit" value="新增">
                    <input type="reset" value="重置">
                </div>
            </form>
        </div>
    </div>
</div>