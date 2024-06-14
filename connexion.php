<?php
include_once(ROOT. "header.php");
include_once(ROOT. "menu.php");
?>

  <form action="<?php echo(ROOT);?>verif_connexion.php" method="post">
    <h1>Se connecter</h1>
    
    <?php
      if (isset($_SESSION["error"])){
        echo($_SESSION["error"]);
        unset($_SESSION["error"]);
      }
    ?>

    <div class="inputs">
      <input type="ID" placeholder="Identifiant" id="identifiant" name="identifiant"/>
      <input type="password" placeholder="Mot de passe" id="mot_de_passe" name="mot_de_passe">
    </div>
     
    <div id="bouton-connexion">
      <button type="submit" class="bouton fond-sombre"><h4>Se connecter</h4></button>
    </div>
  </form>

<?php
include_once("footer.php");
?>
