<?php
session_start();
var_dump($_SESSION);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bonDeMatiere.css">
    <title>LPRS</title>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>

<!--Titre-->
<h1 class="titre"> Bon de Matiére </h1>


<div class="menu">

    <div class="logo">
        <img src="../assets/images/logo_lprs.png" width="150px" >
    </div>

    <div class="professeur">
        Nom :
        <?php
        // VARIABLES
        $bdd = new PDO('mysql:host=localhost:3307;dbname=lprs_stock;charset=utf8', 'root', '');

        // CODE
        $option = $bdd->prepare("SELECT nom FROM profil WHERE fonctionClasse = 'professeur'");
        $option->execute();
        $res = $option->fetchAll();

        echo '<select name="professeur">';
        foreach ($res as $element) {
            echo '<option value="' . $element['nom'] . '">' . $element['nom'] . '</option>';
        }
        echo '</select>';
        ?>

    </div>

    <div class="filiere">
        Filière :
        TU : <label> <input type="radio" value="tu" name="filiere"> </label>
        CPRP : <label> <input type="radio" value="cprp" name="filiere"> </label>
        CQPM : <label> <input type="radio" value="cqpm" name="filiere"> </label>
        FAB SPE : <label> <input type="radio" value="spe" name="filiere"> </label>
    </div>

    <div class="classe">
        Classe :
        <?php
        // VARIABLES
        $bdd = new PDO('mysql:host=localhost:3307;dbname=lprs_stock;charset=utf8', 'root', '');

        // CODE
        $option = $bdd->prepare("SELECT nom FROM classe");
        $option->execute();
        $res = $option->fetchAll();

        echo '<select name="classe">';
        foreach ($res as $element) {
            echo '<option value="' . $element['nom'] . '">' . $element['nom'] . '</option>';
        }
        echo '</select>';
        ?>
    </div>

    <div class="systeme">
        Système :
        <?php
        // VARIABLES
        $bdd = new PDO('mysql:host=localhost:3307;dbname=lprs_stock;charset=utf8', 'root', '');

        // CODE
        $option = $bdd->prepare("SELECT nom FROM systeme");
        $option->execute();
        $res = $option->fetchAll();

        echo '<select name="sys">';
        foreach ($res as $element) {
            echo '<option value="' . $element['nom'] . '">' . $element['nom'] . '</option>';
        }
        echo '</select>';
        ?>
    </div>

    <div class="piece">
        Piéce :
        <?php
        // VARIABLES
        $bdd = new PDO('mysql:host=localhost:3307;dbname=lprs_stock;charset=utf8', 'root', '');
        $img = "";
        // CODE
        $option = $bdd->prepare("SELECT nom,img FROM piece");
        $option->execute();
        $res = $option->fetchAll();
        ?>
        <label>
            <select class="jklm" name="piece">
            <?php
            foreach ($res as $element) {
                echo '<option value="' . $element['img'] . '">' . $element['nom'] . '</option>';
                $img = $element['nom'];
            }
            ?>
            </select>
        </label>
    </div>
    
    <div class="imgSysPiece" >
        <ul>
            <li>

            </li>
            <li>
                <img src="../assets/images/Support GoPro.png" width="200px" >
            </li>
        </ul>
    </div>

    <div class="grid">
        <div class="grid-container">
            <form action="">
                <select name="forme" id="test">
                    <option value="1">1</option>
                </select>

                <select class="aaa" name="forme" id="test">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>

                <label class="t1">Forme : </label>
                <input type="number" name="quantite" placeholder="" size="10">
                <label class="t2">Dimension : </label>
                <input type="number" placeholder="" size="10" class="lgtt">
                <label class="t3">Quantité : </label>
                <input type="number" placeholder="Longueur" class="lgts" size="10">
                <label class="t4">Longueur total</label>
                <input type="number" placeholder="Stock initial" class="stoi" size="10">

                <input type="number" placeholder="Stock final" class="stof" size="10">
            </form>
        </div>
    </div>
</div>

<script src="../assets/js/bonDeMatiere.js"></script>

</body>
</html>