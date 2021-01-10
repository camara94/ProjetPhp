<?php
session_start();
require '../ReclamationManager.php';
require '../Connexion.php';

$db=Connexion();
$reclamationManager=new ReclamationManager($db);

echo $_GET['idReclamation'];

$rec = $reclamationManager->recupererReclamationParId($_GET['idReclamation']);

if( 
    isset($_POST['titre']) && !empty($_POST['titre']) 
    && isset($_POST['message']) && !empty($_POST['message'])
) {
    $reclamationManager->mettreAJourReclamation($_GET['idReclamation'], $_POST['titre'], $_POST['message']);
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
                            <input type="text" value="<?=$rec->getTitre()?>" name="titre" class="form-control" id="titre" placeholder="Le titre de votre réclamation" value="" />
                            <?php if (isset($_POST['titre']) &&  empty($_POST['titre'])) {
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs titre est requis *</div>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <textarea name="message" value="<?=$rec->getMessage()?>" placeholder="Votre message" class="form-control"><?=$rec->getMessage()?></textarea>
                            <?php if (isset($_POST['message']) &&  empty($_POST['message'])) {
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs message est requis *</div>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Modifier reclamation" />
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
