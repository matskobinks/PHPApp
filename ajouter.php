<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "INSERT INTO livres (titre, auteur, annee_publication, genre) 
                VALUES (:titre, :auteur, :annee, :genre)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titre' => $_POST['titre'],
            ':auteur' => $_POST['auteur'],
            ':annee' => $_POST['annee'],
            ':genre' => $_POST['genre']
        ]);
        
        header('Location: index.php');
        exit();
    } catch(PDOException $e) {
        die("erreur d'ajout : " . $e->getMessage());
    }
}
?>
