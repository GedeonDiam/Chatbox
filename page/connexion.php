

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    width: 800px;
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
    width: 90%;
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
    margin-top: 10rem;
}
    </style>
</head>
<body>
    <div class="centre">
    <div class="container">
        <form action="#" method="POST">
            <h2>Connexion</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <button type="submit" name="bouton">Se connecter</button>

            <P>Vous n'avez pas de compte? <a href="index.php?page=inscription">Inscrivez-vous</a></P>
        </form>
    </div>
    </div>
    <?php
   
    if(isset($_POST["bouton"])){
        $email= $_POST["email"];
        $mdp= $_POST["mdp"];

        $req = ("SELECT * FROM users WHERE email = '$email' AND password = '$mdp'");
        $result = mysqli_query($connexion, $req);
   
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["id_users"] = $row["id_user"];
            $_SESSION["email"]=$row["email"];
      header("location: index.php?page=chat");
        } else {
            // L'utilisateur n'est pas authentifié
            echo "Échec de l'authentification. Veuillez vérifier vos informations de connexion.";
        }

    }
   

?>
</body>
</html>
