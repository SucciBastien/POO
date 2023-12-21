<?php 

require_once "Models/LivreManager.class.php";
require_once "index.php";

ob_start() ?>

    <table>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Nombre de pages</th>
            <th>Actions</th>
        </tr>
        <?php for($i=0;$i<count($livres);$i++) :?>

        <tr>
            <td><img src="public/images/<?= $livres[$i]->getImage();?>" alt=""></td>
            <td><a href="<?= URL ?>livres/l/<?= $livres[$i]->getIdLivre(); ?>"><?= $livres[$i]->getTitre();?></a></td>
            <td><?= $livres[$i]->getNbPages();?></td>
            <td>
                <!-- Divisez la colonne "Actions" en deux sous-colonnes -->
                <form method="POST" action="<?= URL ?>livres/m/<?= $livres[$i]->getIdLivre(); ?>">
                    <button type="submit">Modifier</button>
                </form>
                <form method="POST" action="<?= URL ?>livres/s/<?= $livres[$i]->getIdLivre(); ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer ce livre ?');">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endfor; ?>

    </table>
    <a href="<?= URL ?>livres/a"><button>Ajouter</button></a>
    
<?php 
$titre = "Les livres de la bibliothèque";
$content = ob_get_clean();
require "Views/template.php"; 
?>
