<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un personnage</title>
</head>
<style>
    <?php include './asset/style/style.css'; ?>
</style>
<body>
    <h1>Ajouter un personnage</h1>
    <form method="post" action="">
        <label for="nom_personnage">Nom :</label>
        <input type="text" name="nom_personnage" id="nom_personnage" required><br>
        
        <label for="classe_personnage">Classe :</label>
        <input type="text" name="classe_personnage" id="classe_personnage" required><br>
        
        <label for="pv_personnage">PV :</label>
        <input type="number" name="pv_personnage" id="pv_personnage" min="0" required><br>
        
        <label for="attaque_personnage">Attaque :</label>
        <input type="number" name="attaque_personnage" id="attaque_personnage" min="0" required><br>
        
        <label for="defense_personnage">Défense :</label>
        <input type="number" name="defense_personnage" id="defense_personnage" min="0" required><br>
        
        <button type="submit" name="submit">Ajouter Personnage</button>
    </form>
</body>
</html>
