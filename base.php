<?php

date_default_timezone_set("Asia/Taipei");
session_start();

$tstr = [
    'title' => "網站標題管理",
    'ad' => "動態文字管理",
    'mvim' => "動畫圖片管理",
    'image' => "校園映像圖片管理",
    'total' => "進站人數管理",
    'bottom' => "頁尾版權文字管理",
    'news' => "最新管理",
    'admin' => "管理者管理",
    'menu' => "選單管理",
];
$addstr = [
    'title' => "新增網站標題圖片",
    'ad' => "新增動態文字廣告",
    'mvim' => "新增動畫圖片",
    'image' => "新增校園映像圖片",
    'total' => "新增進站人數",
    'bottom' => "新增頁尾版權文字",
    'news' => "新增最新消息",
    'admin' => "新增管理者",
    'menu' => "新增選單",
];

$uploadimg = [
    'title' => ['更新網站標題圖片', '網站標題圖片'],
    'mvim' => ['更換動畫圖片', '動畫圖片圖片'],
    'image' => ['更新校園映像圖片', '校園映像圖片']
];

class DB
{
    private $dsn = "mysql:host=localhost;dbname=db21;charset=utf8";
    private $table;
    private $pw = "";
    private $user = "root";
    private $pdo;


    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
    }

    function all(...$arg)
    {
        $sql = "select * from $this->table ";

        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = sprintf("`%s`='%s'", $key, $value);
                }
                $sql .= " where " . implode(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll();
    }

    function count(...$arg)
    {
        $sql = "select count(*) from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = sprintf("`%s`='%s'", $key, $value);
                }
                $sql .= " where " . implode(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($arg)
    {
        $sql = "select * from $this->table ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql .= " where " . implode(" && ", $tmp);
        } else {
            $sql .= " where `id`='$arg'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($arg)
    {
        $sql = "delete from $this->table ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql .= " where " . implode(" && ", $tmp);
        } else {
            $sql .= " where `id`='$arg'";
        }
        return $this->pdo->exec($sql);
    }

    function save($arg)
    {
        if (isset($arg['id'])) { //update
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql = "update $this->table set " . implode(" , ", $tmp) . " where `id`='{$arg['id']}'";
        } else { //insert
            $sql = "insert into $this->table (`" . implode("`,`", array_keys($arg)) . "`) values('" . implode("','", $arg) . "')";
        }
        return $this->pdo->exec($sql);
    }

    function q($arg)
    {
        return $this->pdo->query($arg)->fetchAll();
    }
}

function to($url)
{
    header("location:" . $url);
}


$Title = new DB("title");
$Ad = new DB("ad");
$Mvim = new DB("mvim");
$Image = new DB("image");
$Bottom = new DB("bottom");
$News = new DB("news");
$Admin = new DB("admin");
$Menu = new DB("menu");
$Total = new DB("total");

$title=$Title->find(['sh'=>1]);
if(empty($_SESSION['visited'])){
    $total['total']++;
    $Total->save($total);
    $total=$Total->find(1);
    $_SESSION=$total['total'];
}
