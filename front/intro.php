<?php
$movie = $Movie->search(['id'=>$_GET['id']]);
$level = $Level->search(['id'=>$movie['level']]);
?>

<div class="tab rb" style="width:87%;">
    <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="./img/<?=$movie['movie']?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <div style="font-size:24px"> <img src="./img/<?=$movie['poster']?>" width="200px" height="250px" style="margin:10px; float:left">
            <p style="margin:3px">影片名稱 ：<?=$movie['name']?>
                <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?=$movie['id']?>'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
            </p>
            <p style="margin:3px">影片分級 ： <img src="./icon/<?=$level['img']?>" style="display:inline-block;"> <?=$level['text']?></p>
            <p style="margin:3px">影片片長 ： <?=$movie['length']?></p>
            <p style="margin:3px">上映日期 : <?=$movie['date']?></p>
            <p style="margin:3px">發行商 ： <?=$movie['publish']?></p>
            <p style="margin:3px">導演 ： <?=$movie['director']?></p>
            <br>
            <br>
            <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br><?=$movie['intro']?>
            </p>
        </div>
        <table width="100%" border="0">
            <tbody>
                <tr>
                    <td align="center"><input type="button" value="院線片清單" onclick="location.href='?'"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>