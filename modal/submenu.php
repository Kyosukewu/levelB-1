<?php
include_once "../base.php";
$subs = $Menu->all(['parent' => $_GET['id']]);
?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="api/editsub.php" method="post" enctype="multipart/form-data">
  <table style="width:70%;margin:auto">
    <tr>
      <td style="text-align:center">次選單名稱</td>
      <td style="text-align:center">選單連結網址</td>
      <td style="text-align:center">刪除</td>
      <td></td>
    </tr>
    <?php
    foreach ($subs as $sub) {
    ?>
      <tr>
        <td style="text-align:center"><input type="text" name="text[]" value="<?= $sub['text']; ?>"></td>
        <td style="text-align:center"><input type="text" name="href[]" value="<?= $sub['href']; ?>"></td>
        <td style="text-align:center"><input type="checkbox" name="del[]" value="<?= $sub['id']; ?>"></td>
        <input type="hidden" name="id[]" value="<?= $sub['id']; ?>">
      </tr>
    <?php
    }
    ?>
  <tr id="btn">
    <td >
      <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
      <input type="hidden" name="parent" value="<?= $_GET['id']; ?>">
      <input type="submit" value="修改確定">
      <input type="reset" value="重置">
      <input type="button" value="更多次選單" onclick="more()">
    </td>
  </tr>
</table>
</form>

<script>
  function more() {
    let str = `
      <tr>
        <td style="text-align:center"><input type="text" name="newtext[]" value=""></td>
        <td style="text-align:center"><input type="text" name="newhref[]" value=""></td>
      </tr>`;//必須使用``才能避免排版問題
      $("#btn").before(str)
  }
</script>