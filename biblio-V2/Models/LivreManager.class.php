<?php
require_once "Models/Model.class.php";
require_once "Models/livre.class.php";

class LivreManager extends BDConnexion{
    private $livres;

    public function ajoutLivre($livre){
        $this->livres[] = $livre;
    }

    public function getLivres(){return $this->livres;}

    public function chargementLivres(){
        /*Cette fonction va faire une requête en BD
        - d'abord on appelle la connexion à la BD
        Après on utilise la fonctione prepare pour écrire la requête
        */
        $req = $this->getBdd()->prepare('SELECT * FROM livres');
        /*Maintenant on va l'exécuter en base de données 
        Pour récupérer les données, on utilise la fonction execute
        */
        $req->execute();
        /*On va maintenant récupérer toutes les lignes */
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);

        /*On ferme la requête avec closeCursor */
        $req->closeCursor();

        /*On a terminé la requete, maintenant on va les parcourir 
        On va créer des objets de type livre, ligne 24 c'est juste un 
        tableau associatif
        */
        foreach($mesLivres as $value){
            //On va gérer des livres des objets de la classe livre
            //En faisant cela, on vient de générer nos livres
            $book = new livre($value['idLivre'],$value['titre'],$value['nbPages'],$value['image']);
            $this->ajoutLivre($book);
        }

    }

    public function getLivreById($id){
        for($i=0; $i<count($this->livres); $i++){
            if($this->livres[$i]->getIdLivre() == $id){
                return $this->livres[$i];
            }
        }
    }

    public function ajoutLivreBDD($titre, $nbPages, $image){
        $req = "INSERT INTO livres(titre, nbPages, image)
        VALUES
        (:titre, :nbPages, :image)";

        $stmt = $this->getBDD()->prepare($req);

        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);

        $resultat = $stmt->execute();

        $stmt->closeCursor();

        if($resultat > 0){
            $livre = new livre($this->getBdd()->lastInsertId(), $titre, $nbPages, $image);
            $this->ajoutLivre($livre);
        }

    }

    public function suppressionLivreBD($id){
        $req = "DELETE FROM livres WHERE idLivre = :idLivre";

        $stmt = $this->getBdd()->prepare($req);

        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $livre = $this->getLivreById($id);
            unset($livre);
        }
    }

    public function modificationLivreBD($id, $titre, $nbPages, $image){
        $req = "UPDATE livres SET titre = :titre, nbPages = :nbPages, image = :image WHERE idLivre = :idLivre;";

        $stmt = $this->getBDD()->prepare($req);

        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);

        $resultat = $stmt->execute();

        $stmt->closeCursor();

        if($resultat > 0){
            $this->getLivreById($id)->settitre($titre);
            $this->getLivreById($id)->setnbPages($nbPages);
            $this->getLivreById($id)->setimage($image);

        }
    }

}