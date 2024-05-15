<?php
// Vérifier si le bouton d'envoi de message a été soumis
if (isset($_POST['bouton'])) {
    // Récupérer le message à envoyer
    $message = $_POST['message'];
    // Construire la requête SQL pour insérer le message dans la base de données
    $req = 'insert into messages (contenu,id_user_recu,id_user_envoi) values ("' . $message . '",' . $_GET["id_user"] . ',' . $_SESSION['id_users'] . ')';
    // Exécuter la requête SQL
    $execute = mysqli_query($connexion, $req);
    // Vérifier si l'exécution de la requête s'est déroulée avec succès
    if ($execute) {
        // Rafraîchir la page après l'envoi du message
        header("Refresh:1");
    } else {
        // Afficher un message d'erreur en cas d'échec de l'insertion du message
        echo "Erreur lors de l'insertion du message.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/discussion.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app" style="height: 100vh">
                    <!-- Liste des utilisateurs -->
                    <div id="plist" style="height: 90vh;   overflow-y: scroll;" class="people-list">
                        <!-- Informations sur l'utilisateur connecté -->
                        <p>
                            <?php echo "<strong><i>" . $_SESSION["nom"] . "</i></strong>" . " " . "<strong><i>" . $_SESSION["prenom"] . "</i></strong>" . "   <a class='float-right' href='index.php?page=deconnexion'><i class='bi bi-box-arrow-left text-danger'></i></a>"; ?>
                        </p>
                        <!-- Titre de la liste des contacts -->
                        <div class="input-group">
                            <p>Liste des contacts</p>
                        </div>
                        <!-- Liste des contacts -->
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            <?php
                            // Récupérer la liste des utilisateurs (sauf l'utilisateur connecté)
                            $resultat = mysqli_query($connexion, "select * from users where id_user !=  $_SESSION[id_users]");
                            while ($ligne = mysqli_fetch_assoc($resultat)) {
                                // Récupérer l'email de l'utilisateur
                                $email = $ligne["email"];
                                // Récupérer l'ID de l'utilisateur
                                $userId  = $ligne["id_user"];
                                // Afficher les détails de l'utilisateur dans un élément de liste
                                echo "<li class='clearfix'>
                                    <a href= 'index.php?page=chat&id_user=" . $ligne["id_user"] . "'>
                                        <img src='https://static.vecteezy.com/system/resources/previews/019/879/198/non_2x/user-icon-on-transparent-background-free-png.png' alt='avatar'>
                                        <div class='about'>
                                            <div class='name'>" . $ligne['nom'] . " " . $ligne["prenom"] . "</div>";
                                            // Vérifier si la longueur de l'email dépasse 15 caractères et ajuster l'affichage
                                            $displayEmail = strlen($email) > 15 ? substr($email, 0, 15) . "..." : $email;
                                            // Afficher l'email de l'utilisateur
                                            echo "<div class='status'> <i class='fa fa-circle online'></i> " . $displayEmail . " </div>";
                                        echo "</div>
                                    </a>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Zone de discussion -->
                    <div class="chat">
                        <!-- Reste du code de la page -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
