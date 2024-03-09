<?php
$movie = $Movie->search(['id'=>$_GET['id']]);
$date = explode("-", $movie['date']);
?>
<div class="rb" style="padding: 10px;">
    <div class="lg ts">
        <form action="./api/edit_movie.php" method="post" enctype="multipart/form-data" style="display: flex; flex-wrap: wrap;">
            <div class="rb ct" style="width: 20%;">影片資料</div>
            <div style="width: 80%; color: black;">
            <input type="hidden" name="id" value="<?=$movie['id']?>">
                <table class="all">
                    <tr>
                        <td>片名:</td>
                        <td><input type="text" name="name" id="" style="width: 90%;" value="<?=$movie['name']?>"></td>
                    </tr>
                    <tr>
                        <td>分級:</td>
                        <td>
                            <select name="level" id="">
                                <option value="1" <?=$movie['level']==1?"selected":""?>>普遍級</option>
                                <option value="2" <?=$movie['level']==2?"selected":""?>>保護級</option>
                                <option value="3" <?=$movie['level']==3?"selected":""?>>輔導級</option>
                                <option value="4" <?=$movie['level']==4?"selected":""?>>限制級</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>片長:</td>
                        <td><input type="text" name="length" id="" style="width: 90%;" value="<?=$movie['length']?>"></td>
                    </tr>
                    <tr>
                        <td>上映日期:</td>
                        <td>
                            <select name="y" id="">
                                <option value="2024" <?=$date[0]==2024?"selected":""?>>2024</option>
                                <option value="2025" <?=$date[0]==2025?"selected":""?>>2025</option>
                            </select>年 
                            <select name="m" id="">
                                <?php
                                for($i=1; $i<=12; $i++){
                                    $state = ($date[1]==$i?"selected":"");
                                    echo "<option value='$i' $state>$i</option>";
                                }
                                ?>
                            </select>月 
                            <select name="d" id="">
                            <?php
                                for($i=1; $i<=30; $i++){
                                    $state = ($date[2]==$i?"selected":"");
                                    echo "<option value='$i' $state>$i</option>";
                                }
                                ?>
                            </select>日
                        </td>
                    </tr>
                    <tr>
                        <td>發行商:</td>
                        <td><input type="text" name="publish" id="" style="width: 90%;" value="<?=$movie['publish']?>"></td>
                    </tr>
                    <tr>
                        <td>導演:</td>
                        <td><input type="text" name="director" id="" style="width: 90%;" value="<?=$movie['director']?>"></td>
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
                <textarea name="intro" id="" style="width: 90%; height: 100px; margin:5px;"><?=$movie['intro']?></textarea>
            </div>
            <div class="all ct rb">
                <input type="submit" value="修改">
                <input type="reset" value="重置">
            </div>
        </form>
    </div>
</div>