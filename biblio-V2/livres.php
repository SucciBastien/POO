<?php 
require_once "livre.class.php";
require_once "manager.class.php";

$livre1 = new livre (1, "HTML", 300, "html.jpg");
$livre2 = new livre (2, "CSS", 350, "css.jpg");
$livre3 = new livre (3, "Le JavaScript", 250, "js.jpg");
$livre4 = new livre (4, "PHP", 550, "php.jpg");

$manager = new manager;
$manager->ajoutLivre($livre1);
$manager->ajoutLivre($livre2);
$manager->ajoutLivre($livre3);
$manager->ajoutLivre($livre4);

ob_start() ?>
    <table>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Nombre de pages</th>
            <th>Actions</th>
        </tr>

        <?php for($i=0; $i<count($manager->getlivres()); $i++) :  ?>
        <tr>
            <td><img src="public/images/<?= $manager->getlivres()[$i]->getimage();?>" alt=""></td>
            <td><?= $manager->getlivres()[$i]->gettitre();?></td>
            <td><?= $manager->getlivres()[$i]->getnbPages();?></td>
            <td>
                <!-- Divisez la colonne "Actions" en deux sous-colonnes -->
                <button>Modifier</button>
                <button>Supprimer</button>
            </td>
        </tr>
        <?php endfor; ?>
    </table>
    <button>Ajouter</button>


<?php 
$titre = "Les livres de la bibliothèque";
$content = ob_get_clean();
require "template.php"; 
?>
