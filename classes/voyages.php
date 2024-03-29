<?php
require_once "database.php";

class Voyage {

public $id_categorie;
public $id_formule;
public $id_voyage;
public $nom;
public $description;
public $descriptionchamp;
public $datededepart;
public $datederetour;
public $prix;
public $imgurl;

 
/*public function add($id_formule, $id_categorie, $nom, $description,  $datededepart, $datederetour, $prix, $imgurl){
    //  une requête SQL pour insérer les données dans la base de données.


    $conn = new Database();
    $conn->connect();
    $request = "INSERT INTO `voyage` (`id-formule`, `id-categorie`, `nom`, `description`,  `datedepart`, `datederetour`, `prix`,`imgurl`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $reponse = $conn->conn->prepare($request);
    $reponse->execute([$id_formule, $id_categorie, $nom, $description, $datededepart, $datederetour, $prix, $imgurl]);
} */
public function add($id_formule, $id_categorie, $nom, $description, $datededepart, $datederetour, $prix, $imgurl) {
    // Connexion à la base de données
    $conn = new Database();
    $conn->connect();
    
    try {
        // Requête SQL pour insérer les données dans la base de données
        $request = "INSERT INTO `voyage` (`id-formule`, `id-categorie`, `nom`, `description`, `datedepart`, `datederetour`, `prix`, `imgurl`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $reponse = $conn->conn->prepare($request);
        $reponse->execute([$id_formule, $id_categorie, $nom, $description, $datededepart, $datederetour, $prix, $imgurl]);
        
        // Redirection vers dashboard.php si l'ajout est réussi
        header("Location: ../templates/dashboard.php");
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout du voyage : " . $e->getMessage();
    }
}



public function getById($id_voyage) {
    $conn = new Database();
    $conn->connect();

    try {
        $request = "SELECT * FROM voyage WHERE `id-voyage`=?";
        $reponse = $conn->conn->prepare($request);
        $reponse->execute([$id_voyage]);
        $voyage = $reponse->fetch(PDO::FETCH_ASSOC);
        
        if ($voyage) {
            return $voyage; // Retourne les détails du voyage sous forme de tableau associatif
        } else {
            return null; // Aucun voyage trouvé avec cet identifiant
        }
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération du voyage : " . $e->getMessage();
        return null; // En cas d'erreur, retourne null
    }
}




public function edit($id_formule, $id_categorie, $nom, $description, $datededepart, $datederetour, $prix, $id_voyage, $_imgurl){
    $conn = new Database();
    $conn->connect();

    try {
        $request = "UPDATE voyage SET `id-formule`=?, `id-categorie`=?, `nom`=?, `description`=?, `datedepart`=?, `datederetour`=?, `prix`=?, `imgurl`=? WHERE `id-voyage`=?";
        $reponse = $conn->conn->prepare($request);
        $reponse->execute([$id_formule, $id_categorie, $nom, $description, $datededepart, $datederetour, $prix, $_imgurl, $id_voyage]);
       // Redirection vers dashboard.php si l'ajout est réussi
       header("Location: ../templates/dashboard.php");
       exit();
    } catch(PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}


public function delete($id_voyage){

    $conn = new Database();
    $conn->connect();
    try  {
        $request = "DELETE FROM voyage WHERE `id-voyage`=?";
        $reponse = $conn->conn->prepare($request);
        $reponse->execute([$id_voyage]);
        echo "Suppression réussie";
    } catch(PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    } 
}


public function showAll() {
    $conn = new Database();
    $conn->connect();

    try {
        $request = "SELECT * FROM voyage";
        $response = $conn->conn->prepare($request);
        $response->execute();
        $results = $response->fetchAll();

        foreach ($results as $row) {
            echo "<div class='trip'>";
            echo "<h3>".$row['nom']."</h3>";
            echo "<p>Date de départ: ".$row['datedepart']."</p>";
            echo "<p>Date de retour: ".$row['datederetour']."</p>";
            echo "<p>Description: ".$row['descriptionchamp']."</p>";
            echo "<p>ID Catégorie: ".$row['id-categorie']."</p>";
            echo "<p>ID Formule: ".$row['id-formule']."</p>";
            echo "<p>Prix: ".$row['prix']."</p>";
            echo "<p>URL de l'image: ".$row['imgurl']."</p>";
            
           $id_voyage= $row['id-voyage'];
           
            //Ajouter un lien autour du bouton permettant de rediriger vers editVoyage.php, on va également ajouté l'id_voyage en paramètre (editVoyage.php?id=35)
            echo "<a href='../controlers/edit.php?id_voyage=".$id_voyage."'><button class='edit-trip-btn'>Modifier</button></a>";
            //Ajouter un lien autour du bouton permettant de rediriger vers delete.php, on va également ajouté l'id_voyage en paramètre (delete.php?id=35)
            echo "<a href='../controlers/delete.php?id_voyage=".$id_voyage."'><button class='delete-trip-btn'>Supprimer</button></a>";
            echo "</div>";
        }
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données : " . $e->getMessage();
    }
}


}

//Dans le fichier delete.php, on va recupérer le paramètre afin de pouvoir le renseigner dans la fonction delete(id) de la classe voyage

