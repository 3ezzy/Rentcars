<?php
require_once "config.php";
// Récupérer l'ID à supprimer 
$id = $_GET['id']; 

// Préparer la requête SQL
$stmt = $connection->prepare("DELETE FROM voitures WHERE id = ?");

// Vérifier si la requête 
if (!$stmt) {
    die("Erreur lors de la préparation de la requête : " . $conn->error);
}

// Lier les paramètres
$stmt->bind_param("i", $id); 

// Exécuter la requête
if ($stmt->execute()) {
    header('Location: cars.php');
} else {
    echo "Erreur lors de la suppression : " . $stmt->error;
}

// Fermer la requête et la connexion
$stmt->close();
$connection->close();
?>
