
<style>
    <?php 
        include './asset/style/style.css'; 
    ?>
</style>
<section></section>
<!-- Formulaire HTML -->
<form method="POST" action="">
  <div class="form-group">
    <label for="pseudo_joueur">Pseudo:</label>
    <input type="text" id="pseudo_joueur" name="pseudo_joueur" required>
  </div>
  <div class="form-group">
    <label for="mail_joueur">Email:</label>
    <input type="email" id="mail_joueur" name="mail_joueur" required>
  </div>
  <div class="form-group">
    <label for="password_joueur">Mot de passe:</label>
    <input type="password" id="password_joueur" name="password_joueur" required>
  </div>
  <div>
    <button type="submit" name="submit">Ajouter Joueur</button>
  </div>
</form>
