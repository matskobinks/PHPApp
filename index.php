<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>super bibliotheque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #545454; color: white">
<img src="logo.png" alt="logo matsko" style="width: 125px; height: 125px; margin: 17px;">
<div class="container mt-5">
    <h1 class="mb-4">ma super bibliothèque qui tue smr</h1>

    <form method="POST" action="ajouter.php" class="mb-5">
        <h3>ajouter un livre</h3>
        <div class="mb-3">
            <input type="text" name="titre" placeholder="titre" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="text" name="auteur" placeholder="auteur" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="number" name="annee" placeholder="année" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="genre" placeholder="genre" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">ajouter le livre dans la bibliothèque</button>
    </form>

    <h3>la bibliothèque</h3>
    <table class="table table-striped" style= "color: white">
        <thead>
            <tr>
                <th>titre</th>
                <th>auteur</th>
                <th>année</th>
                <th>genre</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM livres ORDER BY id DESC";
            $stmt = $pdo->query($sql);
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['titre']}</td>
                        <td>{$row['auteur']}</td>
                        <td>{$row['annee_publication']}</td>
                        <td>{$row['genre']}</td>
                        <td>
                            <a href='modifier.php?id={$row['id']}' class='btn btn-sm btn-warning'>Modifier</a>
                            <a href='supprimer.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Êtes-vous sûr ?\")'>Supprimer</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
