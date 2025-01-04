<!-- <?php
include 'db.php'; 

$sql="SELECT users.name From users ";

$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<p>".$row['name']."</p>";
    }
}
mysqli_close($conn);
?> -->

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chef_order";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Suppression de l'utilisateur si un ID est envoyé via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
        $deleteUserId = intval($_POST['delete_user_id']);
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $deleteUserId);
        $stmt->execute();
        echo "Utilisateur supprimé avec succès.";
    }

    // Récupération des utilisateurs
    $stmt = $conn->query("SELECT id, name FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo htmlspecialchars($user['name']); ?>
                <!-- Formulaire pour supprimer l'utilisateur -->
                <form action="" method="POST" style="display:inline;">
                    <input type="hidden" name="delete_user_id" value="<?php echo $user['id']; ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "chef_order");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Supprimer un utilisateur si un ID est envoyé
if (isset($_GET['delete_user_id'])) {
    $id = intval($_GET['delete_user_id']);
    $conn->query("DELETE FROM users WHERE id = $id");
    header("Location: affichage.php"); // Redirection pour éviter une double soumission
    exit;
}

// Récupérer les utilisateurs
$result = $conn->query("SELECT id, name FROM users");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo htmlspecialchars($row['name']); ?>
                <a href="?delete_user_id=<?php echo $row['id']; ?>">Supprimer</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
