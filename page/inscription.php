<?php
   if (isset($_POST['boutton'])) {
        include('service/connect.php');
        //je récupère les informations de l'utilisateur
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['email'];
        $tel = $_POST['tel'];
        $mdp = $_POST['mdp'];
        //je lance la requête
        $req = "INSERT INTO users (nom,prenom,email,tel,mdp) VALUES ('$nom', '$prenom', '$mail', '$tel', '$mdp')";
        //j'exécute la requête
        $execute = mysqli_query($connexion, $req);
            header("location: index.php?page=qcm");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<STYLE>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.container h2 {
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
}

.form-group input {
    width: 95%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.centre {
    margin-top: 5rem;
}
</STYLE>
<body>
    <div class="centre">
    <div class="container">
        <form action="" method="post">
            <h2>Inscription</h2>
            <div class="form-group">
                <label for="nom">Nom </label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="mail" name="mail" required>
            </div>
          
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <button type="submit" name="boutton">S'inscrire</button>
            <p><a href="index.php?page=connexion">Connectez-vous</a></p>

        </form>
    </div>
    </div>
</body>
</html>
