
<div class="rb" style="padding: 10px;">
    <div class="lg ts">
        <form action="./api/add_movie.php" method="post" enctype="multipart/form-data" style="display: flex; flex-wrap: wrap;">
            <div class="rb ct" style="width: 20%;">影片資料</div>
            <div style="width: 80%; color: black;">
                <table class="all">
                    <tr>
                        <td>片名:</td>
                        <td><input type="text" name="name" id="" style="width: 90%;"></td>
                    </tr>
                    <tr>
                        <td>分級:</td>
                        <td>
                            <select name="level" id="">
                                <option value="1">普遍級</option>
                                <option value="2">保護級</option>
                                <option value="3">輔導級</option>
                                <option value="4">限制級</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>片長:</td>
                        <td><input type="text" name="length" id="" style="width: 90%;"></td>
                    </tr>
                    <tr>
                        <td>上映日期:</td>
                        <td>
                            <select name="y" id="">
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>年 
                            <select name="m" id="">
                                <?php
                                for($i=1; $i<=12; $i++){
                                    echo "<option value='$i'>$i<option>";
                                }
                                ?>
                            </select>月 
                            <select name="d" id="">
                            <?php
                                for($i=1; $i<=30; $i++){
                                    echo "<option value='$i'>$i<option>";
                                }
                                ?>
                            </select>日
                        </td>
                    </tr>
                    <tr>
                        <td>發行商:</td>
                        <td><input type="text" name="publish" id="" style="width: 90%;"></td>
                    </tr>
                    <tr>
                        <td>導演:</td>
                        <td><input type="text" name="director" id="" style="width: 90%;"></td>
                    </tr>
                    <tr>
                        <td>預告影片:</td>
                        <td><input type="file" name="movie" id="" style="width: 90%;"></td>
                    </tr>
                    <tr>
                        <td>電影海報:</td>
                        <td><input type="file" name="poster" id="" style="width: 90%;"></td>
                    </tr>
                </table>
            </div>
            <div class="rb ct" style="width: 20%;">劇情介紹</div>
            <div style="width: 80%; color: black;">
                <textarea name="intro" id="" style="width: 90%; height: 100px; margin:5px;"></textarea>
            </div>
            <div class="all ct rb">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </div>
        </form>
    </div>
</div>