<?php
    session_start();
require '../ReclamationManager.php';
require '../Connexion.php';

$db=Connexion();
$reclamationManager=new ReclamationManager($db);
$data = ['titre'=>$_POST['titre'], 'message'=>$_POST['message'], 'idUtilisateur'=>$_SESSION['id'], 'etat'=>0];

$reclamation=new Reclamation($data);
if( 
    isset($_POST['titre']) && !empty($_POST['titre']) 
    && isset($_POST['message']) && !empty($_POST['message'])
) {
    $reclamationManager->insererReclamation($reclamation);
     header("Location: listeReclamation.php");
     exit();
}

?>
<!DOCTYPE html>
<html>
    <?php include 'entete.php'; ?>
    <body>
        <?php require 'navigation.php';?>
        <div class="container login-container parallax">
            <div class="row">  
                <div class="col-md-8 login-form-2 col-md-offset-2">
                    <h4>Reclamation</h4>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" name="titre" class="form-control" id="titre" placeholder="Le titre de votre réclamation" value="" />
                            <?php if (isset($_POST['titre']) &&  empty($_POST['titre'])) {
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs titre est requis *</div>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <textarea name="message" value="" placeholder="Votre message" class="form-control"></textarea>
                            <?php if (isset($_POST['message']) &&  empty($_POST['message'])) {
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs message est requis *</div>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Reclamation" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            require 'footer.php';
         ?>
    </body>
</html>
