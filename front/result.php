<?php
$order = $Order->search(['id'=>$_GET['id']]);
?>

<style>
    table,tr,td{
    border: 2px solid black;
    }
</style>

<div class="rb" style="padding: 10px;">
    <div class="lg" style="width: 65%; margin:auto; color: black;">
        <legend>感謝您的訂購!</legend>
        <table class="all">
            <tr>
                <td style="width: 30%;">訂單編號</td>
                <td><?=$order['no']?></td>
            </tr>
            <tr>
                <td>電影名稱</td>
                <td><?=$order['name']?></td>
            </tr>
            <tr>
                <td>日期</td>
                <td><?=$order['date']?></td>
            </tr>
            <tr>
                <td>場次時間</td>
                <td><?=$order['time']?></td>
            </tr>
            <tr>
                <td>座位</td>
                <td><?=$order['seat']?></td>
            </tr>
        </table>
        <div class="ct">
            <button onclick="location.href='?'">確認</button>
        </div>
    </div>
</div>