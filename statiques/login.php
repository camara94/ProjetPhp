<?php
session_start();
require '../UtilisateurManager.php';
require '../Connexion.php';

$db=Connexion();
$users=new UtilisateurManager($db);
if( 
    isset($_POST['mail']) && !empty($_POST['mail'])
    && isset($_POST['motDePasse']) && !empty($_POST['motDePasse'])
) {
    $user = $users->login($_POST['mail'], $_POST['motDePasse']);
    if($user != null && $user->getActive()) {
            $_SESSION['nom'] = $user->getNom();
            $_SESSION['fonction'] = $user->getFonction();
            $_SESSION['id'] = $user->getId();
             header("Location: index.php");
             exit();
        }else{
            echo "veuillez activer votre compte";
        }
}
?>
<!DOCTYPE html>
<html>
    <?php include 'entete.php'; ?>
    <body>
        <?php require 'navigation.php';?>
        <div class="container login-container parallax first-section wow fadeIn">
            <div class="row">  
                <div class="col-md-8 login-form-2 col-md-offset-2">
                    <h4>S'authentifier</h4>
                    <form method="POST">
                       
                        
                        <div class="form-group">
                            <input type="text" id="mail" name="mail" class="form-control" placeholder="Your Email *" value="" />
                            <div id="mail-error"></div>
                            <?php if (isset($_POST['mail']) &&  empty($_POST['mail'])) {
                                $_POST['redirect']= 10;
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs é-mail est requis *</div>';
                            } ?>
                        </div>

                        

                        <div class="form-group">
                            <input type="password" id="password" name="motDePasse" class="form-control" placeholder="Votre mot de passe" value="" />
                            <div id="password-error"></div>
                            <?php if (isset($_POST['motDePasse']) &&  empty($_POST['motDePasse'])) {
                                $_POST['redirect']= 10;
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs motDePasse est requis *</div>';
                            } ?>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btnSubmit"  id="btn" value="Login" />
                        </div>
                        <div class="form-group">

                            <a href="login.php" class="ForgetPwd" value="Login">Avez-vous oublié votre mot de passe</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>
