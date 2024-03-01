<?php
include '../database/Base.php';
include '../model/Lrch.php';

//CODE
$cli = new Lrch([
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
]);

$cli -> Connexion();