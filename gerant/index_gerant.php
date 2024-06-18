<?php
include_once("../header.php");
include_once("../menu.php");

if($_SESSION["loggedin"] = false Or $_SESSION["role"] != "gerant"){
    session_destroy();
    header("location: ".ROOT."index.php");
    exit();
}
else {}
?>

<section>
    <div class="nom-de-page">
        <h2>Gestion des stocks</h2>
    </div>
</section>

<section id="liste-boutiques" class="liste">
    <div>
        <?php
        
        ?>
    </div>
</section>

<?php
include_once(ROOT . "footer.php");
?>