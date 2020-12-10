  <h3 class="cent">編輯次選單</h3>
  <hr>
  <form action="api/edit.php" method="post" enctype="multipart/form-data">
      <table style="width:70%;margin:auto">
          <tr>
              <td style="text-align:right">次選單名稱</td>
              <td style="text-align:right">選單連結網址</td>
              <td style="text-align:right">刪除</td>
          </tr>
          <tr>
              <td><input type="text" name="name"></td>
              <td><input type="text" name="href"></td>
              <td>
                  <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
              </td>
          </tr>
      </table>
      <div style="width:300px;margin:auto">
          <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
          <input type="submit" value="修改確定">
          <input type="reset" value="重置">
          <input type="" value="更多次選單">
      </div>
  </form>