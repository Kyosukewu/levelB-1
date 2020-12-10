
<h3>新增動態文字廣告</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="width:70%;margin:auto">
        <tr>
            <td style="text-align:right">帳號：</td>
            <td><input type="text" name="acc"></td>
        </tr>
        <tr>
            <td style="text-align:right">密碼：</td>
            <td><input type="password" name="pw"></td>
        </tr>
        <tr>
            <td style="text-align:right">確認密碼：</td>
            <td><input type="password" name="pwc"></td>
        </tr>
    </table>
    <div style="width:100px;margin:auto">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>