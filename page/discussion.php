<?php
if (isset($_POST['bouton'])) {


    $message = $_POST['message'];
    $req = 'insert into messages (contenu,id_user_recu,id_user_envoi) values ("' . $message . '",' . $_GET["id_user"] . ',' . $_SESSION['id_users'] . ')';

    $execute = mysqli_query($connexion, $req);
    if ($execute) {
        header("Refresh:1");
    } else {
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
                    <div id="plist" style="height: 90vh;   overflow-y: scroll;" class="people-list">
                 
                        <p>
                            <?php echo "<strong><i>". $_SESSION["nom"]."</i></strong>"." ". "<strong><i>". $_SESSION["prenom"]."</i></strong>"."   <a class='float-right' href='index.php?page=deconnexion'><i class='bi bi-box-arrow-left text-danger'></i></a>"; ?>
                        </p>
                        <div class="input-group">
                            <p>Liste des contacts</p>
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            <?php
                            $resultat = mysqli_query($connexion, "select * from users");
                            while ($ligne = mysqli_fetch_assoc($resultat)) {
                                $email = $ligne["email"];

                                // Début de l'élément li
                                echo  "<li class='clearfix'>
                        <a href= 'index.php?page=chat&id_user=" . $ligne["id_user"] . "'>
                            <img src='https://static.vecteezy.com/system/resources/previews/019/879/198/non_2x/user-icon-on-transparent-background-free-png.png' alt='avatar'>
                            <div class='about'>
                                <div class='name'>" . $ligne['nom'] . " " . $ligne["prenom"] . "</div>";

                                // Vérifier si la longueur de l'email dépasse 10 caractères et ajuster l'affichage
                                $displayEmail = strlen($email) > 15 ? substr($email, 0, 15) . "..." : $email;
                                echo "<div class='status'> <i class='fa fa-circle online'></i> " . $displayEmail . " </div>";

                                // Fin de l'élément li
                                echo "</div>
                        </a>
                        </li>";
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="https://static.vecteezy.com/system/resources/previews/019/879/198/non_2x/user-icon-on-transparent-background-free-png.png" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <?php
                                        if (isset($_GET['id_user'])) {

                                            $resultat = mysqli_query($connexion, 'select * from users where id_user= ' . $_GET['id_user']);

                                            while ($ligne = mysqli_fetch_assoc($resultat)) {
                                                echo " <h6 class='m-b-0'>" . $ligne['nom'] . " " . $ligne['prenom'] . "</h6>
                                       <small>" . $ligne['email'] . "</small>";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="chat-history" style="height: 80vh;   overflow-y: scroll;">
                            <ul class="m-b-0">
                                <?php
                                $id_user_recu = 0;
                                if (isset($_GET['id_user'])) {
                                    $id_user_recu = $_GET['id_user'];
                                }
                                $sql = "SELECT * FROM messages WHERE (id_user_recu = " . $_SESSION['id_users'] . " AND id_user_envoi =$id_user_recu) OR (id_user_recu = $id_user_recu AND id_user_envoi = " . $_SESSION['id_users'] . ") ORDER BY date DESC";
                                $resultat = mysqli_query($connexion, $sql);

                                while ($ligne = mysqli_fetch_assoc($resultat)) {
                                    $contenu = $ligne["contenu"];

                                    if ($ligne["id_user_envoi"] == $_SESSION['id_users']) {
                                        echo " <li class='clearfix'>
                                <div class='message other-message float-right'> $contenu </div>
                                </li>";
                                    } else {
                                        echo " <li class='clearfix'>
                                <div class='message-data '>
                                 
                                    <div class='message my-message'>$contenu</div>
    
                                </div>
                               
                            </li> ";
                                    }
                                }
                                ?>


                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <form action="" method="POST">
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                        <a href=""><button type="submit" name="bouton" class="btn btn-lg"><span class="input-group-text"><i class="fa fa-send"></i></span></button></a>
                                    </div>

                                    <input type="text" name="message" class="form-control" placeholder="Enter text here...">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>