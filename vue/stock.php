<!doctype html>
<html lang="en">
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

</body>
</html>
