<?php
include 'Crud.php';

//CODE
$cli = new Crud([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'age'=>$_POST['age'],
    'mdp' => $_POST['mdp'],
]);

$cli -> incription();