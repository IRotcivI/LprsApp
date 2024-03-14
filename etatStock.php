<?php

// Connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$database = "nom_base_de_données";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données de la table employees
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

// Afficher les données dans un tableau HTML
echo '<table id="example" class="table table-striped" style="width:100%">';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Position</th>';
echo '<th>Office</th>';
echo '<th>Age</th>';
echo '<th>Start date</th>';
echo '<th>Salary</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["position"] . '</td>';
        echo '<td>' . $row["office"] . '</td>';
        echo '<td>' . $row["age"] . '</td>';
        echo '<td>' . $row["start_date"] . '</td>';
        echo '<td>' . $row["salary"] . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">Aucune donnée trouvée</td></tr>';
}

echo '</tbody>';
echo '<tfoot>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Position</th>';
echo '<th>Office</th>';
echo '<th>Age</th>';
echo '<th>Start date</th>';
echo '<th>Salary</th>';
echo '</tr>';
echo '</tfoot>';
echo '</table>';

// Fermer la connexion à la base de données
$conn->close();

