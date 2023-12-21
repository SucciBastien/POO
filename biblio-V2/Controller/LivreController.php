<?php

require_once "Models/LivreManager.class.php";
require_once "Models/Model.class.php";

class LivresController{

    private $livreManager;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres();
    }

    public function afficherLivres(){
        $livres = $this->livreManager->getLivres();
        require "Views/livres.view.php";
    }

    public function afficherLivre($id){
        $book = $this->livreManager->getLivreById($id);
        // echo $book->getTitre();
        require "Views/afficherLivre.view.php";
    }

    public function ajoutLivre(){
        require "Views/ajoutLivre.view.php";
    }

    public function ajoutLivreValidation(){
        $file = $_FILES["image"];
        $repertoire = "public/images/";
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        $this->livreManager->ajoutLivreBDD($_POST["titre"], $_POST["nbPages"], $nomImageAjoute);
        header("Location: " . URL . "livres");
    }

    public function suppressionLivre($id){
        //recuperation du nom de l'image
        $nomImage = $this->livreManager->getLivreById($id)->getimage();

        // supression de l'image dans le repertoire concerné
        unlink("public/images/" . $nomImage);

        // suppression de livre dans la BD
        $this->livreManager->suppressionLivreBD($id);

        //Redirection vers la page des livres
        header("Location: " . URL . "livres");
    }

    public function modificationLivre($id){
        $livre = $this->livreManager->getLivreById($id);
        require "Views/modificationLivre.view.php";
    }

    public function modificationLivreValidation(){
        $imageActuelle = $this->livreManager->getLivreById($_POST["identifiant"])->getImage();
        $file = $_FILES['image'];
        if ($file['size'] > 0 ){
            unlink("public/images/" . $imageActuelle );
            $repertoire = "public/images/";
            $nomImageAdd = $this->ajoutImage($file, $repertoire);
        }
        else{
            $nomImageAdd = $imageActuelle;
        }
        $this->livreManager->modificationLivreBD($_POST["identifiant"], $_POST["titre"], $_POST["nbPages"], $nomImageAdd);
        header('Location: ' . URL . "livres");
    }

    public function ajoutImage($file, $dir){
        //Va d'abord vérifier si on a renseigné une image dans le formulaire
        if (!isset($file["name"]) || empty($file["name"])){
            //si c'est ne pas le cas, on aurons une première erreur
            throw new Exception("Vous devez indiquer une image");
        }

        //Ensuite, il va vérifier si le répertoire public/image existe
        //Si c'est pas le cas il va le créer avec les droits 0777
        if(!file_exists($dir)){
            mkdir($dir, 0777);
        }


        do {
            $random = rand(0, 999999);
            $target_file = $dir . $random . "_" . $file["name"];
        } while (file_exists($target_file));

        //On récupère l'extension du fichier
        $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        //on va générer un chiffre aléatoire pour donner un nom de fichier
        

         //Ensuite je fais différents tests pour vérifier que le fichier correspond bien à ce qui est attendu
        if(!getimagesize($file["tmp_name"])){
            throw new Exception("Le fichier n'est pas une image");
        }
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif"){
            throw new Exception("L'extension du fichier n'est pas reconnu");
        }
        if(file_exists($target_file)){
            throw new Exception("Le fichier existe déjà");
        }
        if($file['size'] > 500000){
            throw new Exception("Le fichier est trop gros");
        }
        //Va permettre de rajouter notre image directement dans le dossier
        if(!move_uploaded_file($file['tmp_name'], $target_file)){
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        }
        //Si jamais tout c'est bien passé, on enverra le nom de l'image
        else return ($random."_".$file['name']);

    }

    

}