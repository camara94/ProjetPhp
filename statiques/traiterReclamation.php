<?php 

  	require_once '../ReclamationManager.php';
   	require_once '../UtilisateurManager.php';
   	require_once '../Connexion.php';
   	$db=Connexion();
   	$reclamationManager = new ReclamationManager($db);
   	$utilisateurManager = new UtilisateurManager($db);
 
  	$idReclamation = (int)$_GET['idReclamation'];
  	$idUtilisateur = (int)$_GET['idUtilisateur'];

	function envoyer_mail($mail)
	{
		  $sujet = "Hello from the geek";
		  $corp = "Salut ceci est un email de test envoyer par un script PHP";
		  $headers = "From: mouloukoutoure05@gmail.com";
		 
		  if (mail($mail, $sujet, $corp, $headers)) {
		    echo "Email envoyé avec succès à $dest ...Merci bien";
		  } else {
		    echo "Échec de l'envoi de l'email...";
		  }

	}

     



	//
	$utilisateur = $utilisateurManager->recupererUtilisateurParId($idUtilisateur);
	//
	$reclamation  = $reclamationManager->recupererReclamationParId($idReclamation);

	if ($reclamationManager->mettreAJourReclamationEtat($reclamation->getId(), 1) == 1)
	{
		envoyer_mail($utilisateur->getMail());
		header("Location: listeReclamationTech.php");
		exit();
	} else {
		echo "error";
	}

	