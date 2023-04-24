


<style>
    <?php 
        include './asset/style/style.css'; 
    ?>
</style>

<h1>Connexion</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="mail">Email :</label>
    <input type="email" id="mail" name="mail_joueur" autocomplete="off" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password_joueur" required><br>

    <input type="hidden" name="connexion" autocomplete="off" value="1">
    <button type="submit" name="connexion">Connexion</button>
  </div>
</form>