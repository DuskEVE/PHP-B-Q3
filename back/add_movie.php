<style>
    .form{
        text-align-last: justify;
        padding: 3px 5px;
    }
</style>

<form action="./api/add_movie.php" method="post" enctype="multipart/form-data">

    <div style="display: flex; align-items: start;">
        <div style="width: 15%;">影片資料</div>
        
        <div style="width: 85%;">
            <table class="ts form">
                <tr>
                    <td class="ct">片名:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td class="ct">分級:</td>
                    <td>
                        <select name="level">
                            <option value="1">普遍級</option>
                            <option value="2">保護級</option>
                            <option value="3">輔導級</option>
                            <option value="4">限制級</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="ct">片長:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td class="ct">上映日期:</td>
                    <td>
                        <select name="year">
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>年
                        <select name="month">
                            <?php
                            for($i=1; $i<=12; $i++) echo "<option value='$i'>$i</option>";
                            ?>
                        </select>月
                        <select name="day">
                            <?php
                            for($i=1; $i<=12; $i++) echo "<option value='$i'>$i</option>";
                            ?>
                        </select>日
                    </td>
                </tr>
                <tr>
                    <td class="ct">發行商:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td class="ct">導演:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td class="ct">預告影片</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="ct">電影海報</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display: flex; align-items: start;">
        <div style="width: 15%;">劇情簡介</div>

        <div style="width: 85%;">

        </div>
    </div>
    <div>
        <textarea name="intro" style="width: 99%; height: 100px"></textarea>
    </div>
    <div>
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>

</form>