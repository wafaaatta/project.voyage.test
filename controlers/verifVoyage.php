<?php
/*include_once "../classes/voyages.php";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupération des données du formulaire
    $id_formule = $_POST['formule'];
    $id_categorie = $_POST['categorie'];
    $nom = $_POST['nom'];
    $description = $_POST['descriptionchamp'];
    $datedepart = $_POST['datedepart'];
    $datederetour = $_POST['datederetour'];
    $prix = $_POST['prix'];
    


    // Traitement de l'image

    $target_dir = "SQL/projet.voyage/assets/img/";
    $image_name = basename($_FILES["imgurl"]["name"]); 
    $image_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $target_dir . $image_name; 
   
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
  

    $check = getimagesize($_FILES["imgurl"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["imgurl"]["tmp_name"], $image_path)) {
            $imgurl = "http://".$_SERVER['HTTP_HOST'] . "/" . $target_dir . $image_name;
            $voyage = new Voyage();
            $ajoutReussi = $voyage->add (intval($id_formule), intval($id_formule), $nom, $description, $datedepart, $datederetour, intval($prix), $imgurl);
            echo "The file " . htmlspecialchars($image_name) . " has been uploaded.";

            header("Location: ../templates/dashboard.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
*/



include_once "../classes/voyages.php";

// Vérification si le formulaire a été soumis et la méthode de requête est POST
if(isset($_POST["submit"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    // Récupération des données du formulaire
    $id_formule = $_POST['formule'];
    $id_categorie = $_POST['categorie'];
    $nom = $_POST['nom'];
    $description = $_POST['descriptionchamp'];
    $datedepart = $_POST['datedepart'];
    $datederetour = $_POST['datederetour'];
    $prix = $_POST['prix'];

    // Chemin où stocker les images (par défaut : le dossier 'uploads' dans le répertoire actuel)
    $uploadDirectory = isset($_POST["upload_directory"]) ? $_POST["upload_directory"] : 'uploads/';

    // Crée le dossier s'il n'existe pas
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Vérifie si le fichier image est réel ou une fausse image
    $check = getimagesize($_FILES["imgurl"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Vérifie la taille de l'image
    if ($_FILES["imgurl"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Autorise certains formats de fichiers
    $imageFileType = strtolower(pathinfo($_FILES["imgurl"]["name"],PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Vérifie si $uploadOk est à 0 à cause d'une erreur
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // Si tout est bon, tente d'uploader l'image
    } else {
        // Déplace le fichier vers le dossier de destination
        $targetFile = $uploadDirectory . basename($_FILES["imgurl"]["name"]);
        if (move_uploaded_file($_FILES["imgurl"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["imgurl"]["name"])). " has been uploaded.";
            
            // Création d'un nouvel objet voyage
            $voyage = new Voyage();
            
            // Ajout du voyage avec l'URL de l'image
            $ajoutReussi = $voyage->add($id_formule, $id_categorie, $nom, $description, $datedepart, $datederetour, $prix, $targetFile);
            
            if ($ajoutReussi) {
                header("Location: ../templates/dashboard.php");
                exit(); 
            } else {
                echo "Désolé, une erreur s'est produite lors de l'ajout du voyage.";
            }
        }            
    }
}

?>

    

    
  
