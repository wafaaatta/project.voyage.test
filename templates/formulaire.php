<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      display: flex;
    }
    #left-panel {
      flex: 1;
      padding: 20px;
    }
    #right-panel {
      flex: 1;
      padding: 20px;
    }
    form {
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      width: 80%;
    }
    form input[type="text"],
    form input[type="email"],
    form button {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
      box-sizing: border-box;
    }
    #logout {
      background-color: #ff0000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
      <!-- Colonne 1 -->
      <div class="dashboard">
        <!-- Profil du client -->
        <div class="profile">
            <img src="Ellipse 5.png" alt="Photo du client">
            <h2>Alma</h2>
            <p>alma04@gmail.com</p><br>
            <h2>Dashboard</h2><br>
            <h2>Mes voyages</h2>
        </div>  
      </div>
    
    <form id="add-trip-form"action="../controlers/verifVoyage.php" method="post" enctype="multipart/form-data">
      <h2>Ajouter un voyage</h2>
      <div>
        <input type="text" placeholder="nom" name="nom">
      </div>
      <div>
        <input type="date" placeholder="datedépart" name=datedepart>
      </div>
      <div>
        <input type="date" placeholder="datederetour" name="datederetour">
      </div>
      <div>
        <input type="text" placeholder="descriptionchamp" name="descriptionchamp">
      </div>
      <div>
        <input type="text" placeholder="categorie" name="categorie">
      </div>
      <div>
        <input type="text" placeholder="formule" name="formule">
      </div>
      <div>
        <input type="text" placeholder="prix" name="prix">
      </div>
      <div>
      <input type="file" name="imgurl" id="imgurl">
    </div>
      <button type="submit" name='submit'>Publier le voyage</button>
    </form>

    <div id="right-panel">
        <div class="logo">
          <img src="logo.png" alt="Logo Agence">
         </div>
        <form action="index.php" method="post">
        <button id="logout">Déconnecter</button>
        </form>
    </div>
      
  </div>
</body>
</html>
