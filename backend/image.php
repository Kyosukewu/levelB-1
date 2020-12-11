<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $tstr[$do]; ?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $all = $Image->count();
                $div = 3;
                $pages = ceil($all / $div);
                $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
                // $now=(isset($_GET['p']))??1;  //短寫法
                $start = ($now - 1) * $div;

                $rows = $Image->all("limit $start,$div");
                foreach ($rows as $row) {
                ?>
                    <tr class="yel">
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:100px;height:68px;">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1 ? "checked" : "") ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" value="更換圖片" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')">
                        </td>
                        <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td  colspan="4" style="text-align: center;">
                        <?php
                        if (($now - 1) > 0) {
                        ?>
                            <a class="bl" style="font-size:30px;" href="?do=image&p=<?= $now - 1; ?>">&lt;&nbsp;</a>
                        <?php
                        }
                        for ($i = 1; $i <= $pages; $i++) {
                            if ($i == $now) {
                                $font = "3.5rem";
                            } else {
                                $font = "30px";
                            }
                            echo "<a style='font-size:$font;' href='?do=image&p=$i'> ";
                            echo $i;
                            echo " </a>";
                        }
                        if (($now + 1) <= $pages) {
                        ?>
                            <a class="bl" style="font-size:30px;" href="?do=image&p=<?= $now + 1; ?>">&nbsp;&gt;</a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>

                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add.php?table=<?= $do; ?>')" value="<?= $addstr[$do]; ?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>