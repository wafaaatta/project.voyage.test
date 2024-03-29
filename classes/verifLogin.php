<?php
include_once "database.php";

function verifyUser($nomdutilisateur, $motdepasse) {
    $db = new Database();
    $conn = $db->connect();

    try {
        $stmt = $conn->prepare("SELECT * FROM user WHERE nomdutilisateur = :nomdutilisateur AND motdepasse = :motdepasse");
        $stmt->bindParam(':nomdutilisateur', $nomdutilisateur);
        $stmt->bindParam(':motdepasse', $motdepasse);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? true : false;
    } catch(PDOException $e) {
        // Log the error instead of showing it to the user
        error_log("Erreur : " . $e->getMessage(), 0);
        return false;
    }
}

// Vérification si le formulaire est soumis
if(isset($_POST['nomdutilisateur'], $_POST['motdepasse'])) {
    $nomdutilisateur = $_POST['nomdutilisateur'];
    $motdepasse = $_POST['motdepasse'];

    // Vérification de l'utilisateur
    if(verifyUser($nomdutilisateur, $motdepasse)) {
        // Démarrer une session
        session_start();
        // Stocker des informations sur l'utilisateur connecté dans la session
        $_SESSION['nomdutilisateur'] = $nomdutilisateur;
        // Redirection vers le tableau de bord
        header("Location: ../templates/dashboard.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        header("Location: ../index.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    }
}
?>
