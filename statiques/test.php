<?php
  ini_set("display_errors", 1);
  require_once '../UtilisateurManager.php';
  require_once '../Connexion.php';
  $db=Connexion();

$users=new UtilisateurManager($db);
$user1=new Utilisateur($_POST);
 

  $u = $users->recupererUtilisateurParEmail('mm@gmail.com');
  
  var_dump($u->getId());

 function autre($mail)
 {
   $dest = "mouloukoutoure05@gmail.com";
   $sujet = "Hello from the geek";
   $corp = "Salut ceci est un email de test envoyer par un script PHP";
   $headers = "From: mouloukoutoure05@gmail.com";
 
   if (mail($dest, $sujet, $corp, $headers)) {
     echo "Email envoyé avec succès à $dest ...Merci bien";
    } else {
      echo "Échec de l'envoi de l'email...";
    }
 }


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
  //mailHTML("mouloukoutoure05@gmail.com", 48);
?>



