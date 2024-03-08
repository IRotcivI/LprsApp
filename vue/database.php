<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/database.css">
    <title>LPRS</title>
</head>
<body>

<h1 class="titre">Mise à jour base de données </h1>

<table>
    <tr>
        <th>FORMES :</th>
    </tr>
    <tr>
        <td>ROND</td>
    </tr>
    <tr>
        <td><img src="../assets/image/rond .png" width="150px" ></td>

        <td><label for ="matiere-select">Quel matiere souhaitez vous ?</label><br>
            <select name = "matiere" id="matiere-select">
                <option value ="matiere1">matiere1</option>
                <option value ="matiere2">matiere2</option>
                <option value ="matiere3">matiere3</option>
                <option value ="matiere4">matiere4</option>
            </select></td>

        <td>
            Diametre
            <input type="text" id="name" name="name" required minlength="4" maxlength="8" size="6" placeholder="en m"/>
        </td>
        <td>
            Longueur
            <input type="text" id="name" name="name" required minlength="4" maxlength="8" size="6" placeholder="en m"/>
        </td>

    </tr>
    <tr>
        <td><br><br>MEPLAT</td>
    </tr>
    <tr>
        <td><img src="../assets/image/Méplat.png" width="150px" ></td>

        <td><label for ="matiere-select">Quel matiere souhaitez vous ?</label><br>
            <select name = "matiere" id="matiere-select">
                <option value ="matiere1">matiere1</option>
                <option value ="matiere2">matiere2</option>
                <option value ="matiere3">matiere3</option>
                <option value ="matiere4">matiere4</option>
            </select></td>

        <td>
            Diametre
            <input type="text" id="name" name="name" required minlength="4" maxlength="8" size="6" placeholder="en m"/>
        </td>
        <td>
            Longueur
            <input type="text" id="name" name="name" required minlength="4" maxlength="8" size="6" placeholder="en m"/>
        </td>
        <td>
            Largeur
            <input type="text" id="name" name="name" required minlength="4" maxlength="8" size="6" placeholder="en m"/>
        </td>
    </tr>
</table>



</body>
</html>