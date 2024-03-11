<style>
    .order-list{
        width: 100%;
        height: 360px;
        overflow-y: auto;
        color: black;
    }
    td{
        border-bottom: 1px solid black;
    }

</style>

<?php
$orders = $Order->searchAll();
$movies = $Order->sql("select `name` from `booking` group by `name`");
?>
<div class="rb" style="padding: 10px; width: 98%; height: 480px;">
    <div class="ts lg" style="padding: 5px;">
        <h3 class="ct rb">訂單清單</h3>
        <div style="color: black;">
            快速刪除: 
            <input type="radio" class="type" value="date">依日期
            <input type="text" id="date">

            <input type="radio" class="type" value="name">依電影
            <select name="" id="name">
                <?php
                foreach($movies as $movie) echo "<option value='{$movie['name']}'>{$movie['name']}</option>";
                ?>
            </select>

            <button class="del-select-btn">刪除</button>
        </div>
        <hr>
        <div class="order-list">
            <table class="all ct">
                <tr>
                    <td>訂單編號</td>
                    <td>電影名稱</td>
                    <td>日期</td>
                    <td>場次時間</td>
                    <td>訂購數量</td>
                    <td>訂購位置</td>
                    <td>操作</td>
                </tr>
                <?php
                foreach($orders as $order){
                ?>
                <tr>
                    <td><?=$order['no']?></td>
                    <td><?=$order['name']?></td>
                    <td><?=$order['date']?></td>
                    <td><?=$order['time']?></td>
                    <td><?=$order['count']?></td>
                    <td><?=$order['seat']?></td>
                    <td><button class="del-btn" data-id="<?=$order['id']?>">刪除</button></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

<script>
    $('.del-select-btn').on('click', () => {
        let type = $('.type:checked').val();
        let target = $(`#${type}`).val();

        $.post('./api/del_order.php', {key:type, value:target}, () => location.reload());
        // $.post('./api/del_order.php', {key:type, value:target}, (re) => console.log(JSON.parse(re)));
    });
    $('.del-btn').on('click', (event) => {
        let id = $(event.target).data('id');
        $.post('./api/del_order.php', {id}, () => location.reload());
    });
</script>