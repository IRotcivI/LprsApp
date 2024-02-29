<?php
include '../database/Base.php';
include '../model/Lprs.php';

//CODE
$cli = new Lprs([
    'email' => $_POST['email'],
    'mdp' => $_POST['mdp'],
]);

$cli -> Connexion();