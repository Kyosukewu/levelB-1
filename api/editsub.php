<?php
include_once "../base.php";

    foreach ($_POST['id'] as $key => $id) {
        if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
            $Menu->del($id);
        } else {
            $data = $Menu->find($id);
            $data['text']=$_POST['text'][$key];
            $data['href']=$_POST['href'][$key];
            $Menu->save($data);
        }
    }

    if(isset($_POST['newtext'])){
        foreach($_POST['newtext'] as $key=>$text){
            if(!empty($text)){
            $add=[];
            $add['text']=$text;
            $add['href']=$_POST['newhref'][$key];
            $add['parent']=$_POST['parent'];
            $add['sh']=1;
            $Menu->save($add);
            }
        }
    }

to("../backend.php?do=menu");

?>