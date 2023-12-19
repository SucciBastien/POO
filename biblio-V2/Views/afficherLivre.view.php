<?php ob_start(); ?>
<div>
    <img src="<?= URL ?>public/images/<?= $book->getimage() ?>" alt="">
    <p>Titre : <?= $book->getTitre() ?></p>
    <p>Nombre de pages : <?= $book->getNbPages() ?></p>

</div>

<?php
$titre = $book->getTitre();
$content = ob_get_clean();
require "Views/Template.php";
?>