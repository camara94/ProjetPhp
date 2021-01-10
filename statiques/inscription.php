<?php
session_start();
require '../UtilisateurManager.php';
require '../Connexion.php';

$db=Connexion();
$users=new UtilisateurManager($db);
$user1=new Utilisateur($_POST);

function mailHTML($mail, $id)
  {
    $entetes='';
    $mess='';
    $mime_boundary = "----nomdusite----".md5(time());

    $texte_html  = "Bienvenuee sur notre site \n";
    $texte_html .= "Veuillez activer votre compte\n http://localhost/projetPhp/statiques/activerCompte.php?id=$id";

    "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
    $entetes .= "X-Sender: <http://localhost/projetPhp/statiques/>\n";
    $entetes .= "X-Mailer: PHP/" . phpversion() . " \n" ;
    $entetes .= "X-Priority: 3 (normal) \n";
    $entetes .= "X-auth-smtp-user: mouloukoutoure05@gmail.com\n";
    $entetes .= "X-abuse-contact: mouloukoutoure05@gmail.com\n";
    $entetes .= "Importance: Normal\n";
    $entetes .= "Reply-to: services@nomdusite.org\n";

    


    $mess .= "Content-Type: text/html; charset=ISO-8859-1\n";
    $mess  = "From: mouloukoutoure05@gmail.com";
    $mess .= $texte_html;
    $date_mail = date("d-m-Y"); // la date (optionnelle)
    mail($mail,"ISET Djerba - $date_mail",$mess,$entetes);
  }


if( 
    isset($_POST['nom']) && !empty($_POST['nom']) 
    && isset($_POST['prenom']) && !empty($_POST['prenom'])
    && isset($_POST['mail']) && !empty($_POST['mail'])
    && isset($_POST['telephone']) && !empty($_POST['telephone'])
    && isset($_POST['motDePasse']) && !empty($_POST['motDePasse'])
    && isset($_POST['fonction'])  && !empty($_POST['fonction'])
    && isset($_POST['confirmation']) && !empty($_POST['confirmation'])
) {
    $users->insererUtilisateur($user1);
    $u = $users->recupererUtilisateurParEmail($_POST['mail']);
    mailHTML($u->getMail(), $u->getId());
    header("Location: index.php");
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
                    <h4>S'inscrire</h4>
                    <form method="POST">
                        <input type="hidden" name="redirect" value="0">
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre Nom" value="" />
                            <div id="nom-error"></div>
                            <?php if (isset($_POST['nom']) &&  empty($_POST['nom'])) {
                                $_POST['redirect']= 10;

                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs prénom est requis *</div>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Votre prénom" value="" />
                            <div id="prenom-error"></div>
                            <?php if (isset($_POST['prenom']) &&  empty($_POST['prenom'])) {
                                $_POST['redirect']= 10;

                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs prénom est requis *</div>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <input type="text" id="mail" name="mail" class="form-control" placeholder="Your Email *" value="" />
                            <div id="mail-error"></div>
                            <?php if (isset($_POST['mail']) &&  empty($_POST['mail'])) {
                                $_POST['redirect']= 10;
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs é-mail est requis *</div>';
                            } ?>
                        </div>

                        <div class="form-group">
                           <label class="text-center form-control" style="width: 18%; float: left; margin-top: 1.3%; padding: auto 20px;">Fonction: </label>
                           <select name="fonction" class="form-control" style="width: 80%; float: right;">
                               <option value="Technicien">Technicien</option>
                               <option value="Enseignant">Enseignant</option>
                           </select>
                            <?php if (isset($_POST['fonction']) &&  empty($_POST['fonction'])) {
                                $_POST['redirect']= 10;
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs fonction est requis *</div>';
                            } ?>
                        </div>

                        <div class="form-group">
                            <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Votre Numéro de Tel." value="" />
                            <div id="telephone-error"></div>
                            <?php if (isset($_POST['telephone']) &&  empty($_POST['telephone'])) {
                                $_POST['redirect']= 10;
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le champs téléphone est requis *</div>';
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
                            <input type="password" id="confirmation" name="confirmation" class="form-control" placeholder="confirmation" value="" />
                            <div id="confirmation-error"></div>
                            <?php if ( isset($_POST['confirmation'])  && $_POST['motDePasse'] != $_POST['confirmation'] ) {
                                $_POST['redirect']= 10;
                                echo '<div style="color:red; font-style: italic; font-size: 18px"> le mot de passe ne correspond pas *</div>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit"  id="btn" value="S'inscrire" />
                        </div>
                        <div class="form-group">

                            <a href="login.php" class="ForgetPwd" value="Login">Avez-vous déjà un compte</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>
    </body>
</html>
