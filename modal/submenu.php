  <?php
    include_once "../base.php";
    $db = new DB($_GET['table']);
    $subs = $db->all(["parent" => $_GET['id']]);
    ?>

  <h3 class="cent">編輯次選單</h3>
  <hr>
  <form action="api/edit.php" method="post" enctype="multipart/form-data">
      <table style="width:70%;margin:auto">
          <tr>
              <td style="text-align:center">次選單名稱</td>
              <td style="text-align:center">選單連結網址</td>
              <td style="text-align:center">刪除</td>
          </tr>
          <?php
            foreach ($subs as $sub) {
            ?>
              <tr>
                  <td style="text-align:center"><input type="text" name="name"></td>
                  <td style="text-align:center"><input type="text" name="href"></td>
                  <td style="text-align:center">
                      <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                  </td>
              </tr>
          <?php
            }
            ?>
      </table>
      <div style="width:100%;text-align:center;">
          <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
          <input type="submit" value="修改確定">
          <input type="reset" value="重置">
          <input type="" value="更多次選單">
      </div>
  </form>