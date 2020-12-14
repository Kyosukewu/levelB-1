<?php
include_once "../base.php";
session_start();
// session_destroy();
unset($_SESSION['login']);
to("../index.php?do=login");

?>