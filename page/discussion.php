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
        <div class="card chat-app"style= "height: 100vh">
            <div id="plist" style= "height: 90vh;   overflow-y: scroll;" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    <?php
                     $resultat = mysqli_query($connexion, "select * from users");
                     while($ligne = mysqli_fetch_assoc($resultat)){
                        $email = $ligne["email"];

                        // Début de l'élément li
                        echo  "<li class='clearfix'>
                        <a href= 'index.php?page=chat&id_user=".$ligne["id_user"]."'>
                            <img src='https://bootdey.com/img/Content/avatar/avatar1.png' alt='avatar'>
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
            <div class="chat" >
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">Aiden Chavez</h6>
                                <small>Last seen: 2 hours ago</small>
                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>
                <div class="chat-history" style= "height: 80vh;   overflow-y: scroll;" >
                    <ul class="m-b-0">
                        <li class="clearfix">
                            <div class="message-data ">
                             
                                <div class="message my-message">Project has been already finished and I have results to show you.</div>

                            </div>
                            <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                        </li>
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-send"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter text here...">                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>


