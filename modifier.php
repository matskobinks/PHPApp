<?php
include 'config.php';

if(isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $livre = $stmt->fetch();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "UPDATE livres SET 
                titre = :titre,
                auteur = :auteur,
                annee_publication = :annee,
                genre = :genre
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titre' => $_POST['titre'],
            ':auteur' => $_POST['auteur'],
            ':annee' => $_POST['annee'],
            ':genre' => $_POST['genre'],
            ':id' => $_POST['id']
        ]);
        
        header('Location: index.php');
        exit();
    } catch(PDOException $e) {
        die("Erreur de modification : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>modifier livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>modifier le livre</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $livre['id'] ?>">
        
        <div class="mb-3">
            <input type="text" name="titre" value="<?= $livre['titre'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="text" name="auteur" value="<?= $livre['auteur'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="number" name="annee" value="<?= $livre['annee_publication'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="genre" value="<?= $livre['genre'] ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
</body>
</html>
