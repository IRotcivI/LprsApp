<!doctype html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lprs</title>
</head>
<body>
<l1>
    Gestion du stock LPRS
<br>
    <br>
</l1>

<!--Formulaire de connexion-->
<form method="post" action="../src/trait/traitConnexion.php">
    <table>
        <tr>
            <td>
                Identifiant :
            </td>
            <td>
                <input type="text" name="email" required>
            </td>
        </tr>

        <tr>
            <td>
                Mot de passe :
            </td>
            <td>
                <input type="password" name="mdp" required>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="Connexion">
            </td>
        </tr>
    </table>
</form>

<br>
<p>Mise a jour des données : <button type="button" class="btn btn-danger"></button></p>
<p>Bon de debit matiere : <button type="button" class="btn btn-secondary"></button></p>
<p>Bon de commande : <button type="button" class="btn btn-primary"></button></p>
<p>Etat des stocks : <button type="button" class="btn btn-success"></button></p>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
