<?php
include "../base.php";

$table = $_POST['table'];
$db = new DB($table);

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        $data = $db->find($id);
        switch ($table) {
            case "title":
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = ($id == $_POST['sh']) ? 1 : 0;
                break;
            case "admin":
                $data['acc'] = $_POST['acc'][$key];
                $data['pw'] = $_POST['pw'][$key];
                break;
            case "menu":
                $data['text'] = $_POST['text'][$key];
                $data['href'] = $_POST['href'][$key];
                $data['sh'] = (in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
            case "total":
                $data['total'] = $_POST['total'];
                break;
            case "bottom":
                $data['bottom'] = $_POST['bottom'];
                break;
            default:
                $data['text'] = $_POST['text'][$key];
                $data['sh'] =  (in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
        }
        $db->save($data);
    }
}

to("../backend.php?do=$table");
