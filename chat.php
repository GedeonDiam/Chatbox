<?php
$id = mysqli_connect("localhost", "root", "", "chatbox");
if(isset($_POST["bouton"])){
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    $requete = "insert into messages (pseudo,message,date)
                values ('$pseudo','$message',now())";
    mysqli_query($id,$requete);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylechat.css">
</head>
<body>
    <div class="container">
        <h1>Chattez'en direct! Chatbox</h1>
        <div class="messages">
            <ul>
                <?php
                
                $resultat = mysqli_query($id, "select * from messages order by date desc");
                while($ligne = mysqli_fetch_assoc($resultat)){
                    $pseudo = $ligne["pseudo"];
                    $message = $ligne["message"];
                    $date = $ligne["date"];
                    echo "<li class='mess'>$date - $pseudo : $message</li>";
                }
                ?>
                
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo :" required>
                <input type="text" name="message" placeholder="Message :" required><br>
                <input type="submit" value="Envoyer" name="bouton">
            </form>
        </div>
    </div>
</body>
</html>