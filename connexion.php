<?php
include_once("header.php");
include_once("menu.php");
?>

  <form>
    <h1>Se connecter</h1>
    
    <?php
      if (isset($_SESSION["error"])){
        echo($_SESSION["error"]);
        unset($_SESSION["error"]);
      }
    ?>
    <div class="inputs">
      <input type="ID" placeholder="Identifiant" />
      <input type="password" placeholder="Mot de passe">
    </div>
     
    <div id="bouton-connexion">
      <button type="submit" class="bouton fond-sombre">Se connecter</button>
    </div>
  </form>

<?php
include_once("footer.php");
?>
