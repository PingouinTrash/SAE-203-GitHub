<?php
require_once("header.php");
?>

<header>
    <div class="logo-header">
        <img class="logo" src="<?php echo(ROOT);?>media/logoConfiserie.png" alt="Logo La Confiserie">
        <img class="fond" src="<?php echo(ROOT);?>media/Fond.png" alt="Fond marbre">
    </div>
    <nav class="menu">
        <ul>
            <li><a href="<?php echo(ROOT);?>index.php">Accueil</a></li>
            <li><a href="<?php echo(ROOT);?>boutique.php">Boutiques</a></li>
            <!-- <li><a href="<?//php echo(ROOT);?>panier.php">Panier</a></li> -->
            <?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    echo('<li><a href="'.ROOT.'/deconnexion.php">Déconnexion</a></li>');
                }
                else {
                    echo('<li><a href="'.ROOT.'/connexion.php">Connexion</a></></li>');
                }
            ?>
        </ul>
    </nav>
</header>
<main>