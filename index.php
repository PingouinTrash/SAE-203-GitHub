<?php
include_once("header.php");
include_once("menu.php");
?>

    <section class="accueil">
        <h1>Bienvenue à la Confiserie !</h1>

        <img src="<?php echo(ROOT);?>media/ligne.png" alt="">

        <div class="presentation">
            <p>Bienvenue sur notre boutique en ligne ! <br> Depuis ce site, vous pourrez accéder à toutes les boutiques de la Confiserie et toutes les délicieuses friandises en stock !</p>
        </div>
    
        <a href="boutique.php">
            <div id="bouton-boutique" class="bouton fond-clair">
                <h4>Vers la boutique</h4>
            </div>
        </a>

        <div class="presentation">
            <p class="paragraphe">
                La confiserie est une entreprise familliale créée en 1847 par Emile Bonpère à Aix en Provence. Spécialisée dans la fabrication de calissons, "La Confiserie" a très rapidement étendue son catalogue de produits à d'autre sucreries : Sucettes, Nougats, Berlingots, Sucres d'orges, Boules de gommes, Caramel, Dragée, Guimauve, Marrons Glacés... mais surtout la Bergamote de Nancy ! pour laquelle "La Confiserie" dispose d'une dérogation particulière pour sa fabrication (normalement fabriquée uniquement à Nancy).
                <br><br>
                En 1985 Emile cède son entreprise à sa fille Chantal qui fera en sorte de maintenir la fabrication artisanale des sucreries à Aix malgré un contexte conccurentiel de plus en plus dur. En 2020, c'est au tour d'Annie de rejoindre l'entreprise familliale. Titulaire d'un MBA obtenue aux USA, elle décide de rentrer en France pour aider sa mère et développe une stratégie de commercialisation de la production familliale à travers un réseau international de grossistes spécialisés dans la revente des produits maisons. 
                <br><br>
                Annie veille à maintenir et à valoriser le côté artisanal des productions et la savoir faire de la maison "La Confiserie". Si aujourd'hui... de nombreux processus ont été automatisé, chaque bonbon produit par "La Confiserie" est d'une très grande qualité, toujours fabriqué avec des ingrédients sélectionnés avec soin et malgré la mécanisation, les recettes n'ont pas changé, conférant aux bonbons le goût de cette tradition chère à la famille Bonpère.
                <br><br>
                Est-il nécessaire de préciser que cette qualité a un prix... et que "La Confiserie" s'adresse à une clientèle aisée ayant un certain pouvoir d'achat et pour qui "manger un bonbon" n'est certainement pas réservé aux enfants mais plutôt destiné à combler une petite envie "coupable" ! pour des séniors ou des cadres supérieurs.
            </p>
        </div>
    </section>

<?php
include_once("footer.php");
?>
