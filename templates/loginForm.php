
    <title>Formulaire de connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("hat.webp");
            width:100%;
        }
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            align-items: center;
            display: flex;
            justify-content: flex-start;
            flex-wrap: nowrap;
            flex-direction: row;
            
        
        }
        .nav-links {
            list-style-type: none;
            margin: 0;
            padding: 0;
             display: flex;
            flex-direction:row;
            justify-content: space-around;
        }
        .nav-links li {
            margin: 10px;
           
        }
        .nav-links li a {
            color: #fff;
            text-decoration: none;
        }
        .form-container {
            text-align: center;
            margin-top: 50px;
        }

        
        form {
            width: 500px; 
            margin: 0 auto; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 50%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            width:50%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">
      <img src="logo" alt="Logo" width=70%>
    </div>
    <ul class="nav-links">
      <li><a href="Accueil.html">Accueil</a></li><br>
      <li><a href="Adhérez.html">Adhérez!</a></li><br>
      <li><a href="Séjour.html">Séjour 2 pour 1</a></li><br>
      <li><a href="Parrainez.html">Parrainez tous vos amis!</a></li><br>
      <li><a href="contact.html">Contact</a></li><br>

    </ul>
</nav>
<div class="form-container">
<form action="classes/verifLogin.php" method="post">
<div class="input-container"> 
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Nom d'utilisateur" name="nomdutilisateur">
  </div>
    <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Mot de passe" name="motdepasse">
  </div>
    <input type="submit" value="Se connecter">
</form>
</div>

