<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bonDeMatiere.css">
    <title>LPRS</title>
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
        <select name="professeur" id="prof">
            <option value="">Professeur en charge</option>
        </select>
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
        <select name="classe" id="classe">
            <option value="">Classe en charge</option>
        </select>
    </div>

    <div class="systeme">
        Système :
        <select name="systeme" id="systeme">
            <option value="">Système</option>
        </select>
    </div>

    <div class="piece">
        Piéce :
        <select name="piece" id="pice">
            <option value="">Piéce</option>
        </select>
    </div>
    
    <div class="imgSysPiece" >
        <div class="column" style="text-align: center">
            <img src="../assets/images/Support GoPro.png" width="200px" >
        </div>
        <div class="column" style="text-align: center">
            <img src="../assets/images/Go%20Pro%20-%20Corps.jpg" width="200px">
        </div>
    </div>

</div>

</body>
</html>