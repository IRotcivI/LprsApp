<?php
include '../model/Lrch.php';
include '../database/Base.php';
var_dump($_POST);
//CODE
$cli = new Lrch([
    'menu' => $_POST['menu'],
]);
$cli -> Menu();