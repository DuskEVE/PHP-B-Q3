
<div class="rb tab">
    <?php
    if(isset($_SESSION['user'])) echo "<h2 class='ct'>請選擇所需功能</h2>";
    else{
    ?>
    <fieldset style="width: 60%; margin:auto;">
        <legend>管理者登入</legend>

        <div style="color: red;"><?=isset($_GET['error'])?"帳號或密碼錯誤!":""?></div>

        <form action="./api/login.php" method="post">
            <table class="all ct">
                <tr>
                    <td>帳號:</td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td>密碼:</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <div class="ct">
                <input type="submit" value="登入">
                <input type="reset" value="重置">
            </div>
        </form>
    </fieldset>
    <?php
    }
    ?>
    <!-- <h2 class="ct">請選擇所需功能</h2> -->
</div>