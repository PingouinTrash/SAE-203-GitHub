<?php
include_once("header.php");
?>

<header>
    <div class="logo-header">
        <img class="logo" src="<?php echo(ROOT);?>media/logoConfiserie.png" alt="Logo La Confiserie">
        <img class="fond" src="<?php echo(ROOT);?>media/Fond.png" alt="Fond marbre">
    </div>
    <nav class="menu">
        <ul>
            <?php
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    echo(
                        '<li><a href="'.ROOT.'index.php">Accueil</a></li>
                        <li><a href="'.ROOT.'boutique.php">Boutiques</a></li>'
                    );

                    if($_SESSION["role"] == "admin") {
                        echo('<li><a href="'.ROOT.'admin/index_admin.php">Gestion</a></li>');
                    }
                    elseif($_SESSION["role"] == "gerant") {
                        echo('<li><a href="'.ROOT.'gerant/index_gerant.php">Gestion</a></li>');
                    }

                    echo('<li><a href="'.ROOT.'deconnexion.php">Déconnexion</a></li>');
                }
                else {
                    echo(
                        '<li><a href="'.ROOT.'index.php">Accueil</a></li>
                        <li><a href="'.ROOT.'boutique.php">Boutiques</a></li>
                        <li><a href="'.ROOT.'connexion.php">Connexion</a></></li>'
                    );
                }
            ?>
        </ul>
    </nav>
</header>
<main>