<?php ob_start() ?>

<form action="<?= URL ?>livres/av" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre"><br>
    <label for="nbPages">Nombre de pages :</label><br>
    <input type="text" id="nbPages" name="nbPages"><br> <br>
    <label for="image" >Image :</label><br>
    <input type="file" id="image" name="image">
    <br><br>
    <input type="submit">
</form>

<?php 
$titre = "Ajout d'un livre";
$content = ob_get_clean();
require "Views/template.php"; 
?>