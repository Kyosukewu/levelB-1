<?php
include "../base.php";

$table = $_POST['table'];
$db = new DB($table);

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        $row = $db->find($id);

        switch ($table) {
            case "title":
                $data['text'] = $_POST['text'][$eky];
                $data['sh'] = ($id==$_POST['sh'])?1:0;
                break;
            case "admin":
                $data['acc'] = $_POST['acc'][$eky];
                $data['pw'] = $_POST['pw'][$eky];
                break;
            case "menu":
                $data['name'] = $_POST['name'][$eky];
                $data['href'] = $_POST['href'][$eky];
                $data['sh'] = (in_array($id,$_POST['sh']))?1:0;
                break;
            default:
                $data['text'] = $_POST['text'][$eky];
                $data['sh'] =  (in_array($id,$_POST['sh']))?1:0;
                break;
        }
        $db->save($data);
    }
}

to("../backend.php?do=$table");
