<?php
include_once "../base.php";
?>
<h3><?=$addstr[$_GET['table']];?></h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>新增最新消息資料</td>
            <td><textarea  name="text" rows="1" cols="50"></textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="table" value="<?=$_GET['table'];?>">
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>