
<h2 class="ct">訂單清單</h2>
<div class="qdel">
    <input type="radio" name="type" id="">
    <input type="text" name="date" id="">
    <input type="radio" name="type" id="">
    <select name="movie" id="movie">
        <?php
        $movies = $Order->sql("select `movie` from `orders` Group by `movie`");
        foreach($movies as $movie){
            echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
        }
        ?>
    </select>
    <button>刪除</button>
</div>

<style>
    .lists{
        overflow: auto;
        height: 400px;
        width: 100%;
    }
    .header{
        display: flex;
        justify-content: space-between
    }

</style>

<div class="lists">
    <?php
    $orders = $Order->searchAll();
    foreach($orders as $order)
    ?>
    <div class="header">
        <div>訂單編號</div>
        <div>電影名稱</div>
        <div>日期</div>
        <div>場次時間</div>
        <div>訂購數量</div>
        <div>訂購位置</div>
        <div>操作</div>
    </div>
    <div class="item">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<script>
    function del(id){
        $.post("./api/del.php", {table: 'orders', id}, ()=>{
            location.reload();
        })
    }

    function qdel(){
        let type = $("input[name='type']:checked");
    }
</script>