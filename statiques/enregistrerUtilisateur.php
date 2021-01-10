
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
} else {
    $_SESSION['err_nom']='le champs nom est requis *';
	header("Location: inscription.php");
    exit();
}



?>