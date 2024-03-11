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
                $orders = $Order->searchAll();
                foreach($orders as $order){
                ?>

                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>