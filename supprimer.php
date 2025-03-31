<?php
include 'config.php';

if(isset($_GET['id'])) {
    try {
        $sql = "DELETE FROM livres WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]);
        
        header('Location: index.php');
        exit();
    } catch(PDOException $e) {
        die("Erreur de suppression : " . $e->getMessage());
    }
}
?>
