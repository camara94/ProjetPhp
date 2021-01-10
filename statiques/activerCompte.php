<?php
   	require_once '../UtilisateurManager.php';
   	require_once '../Connexion.php';
   	$db=Connexion();
   
   	$utilisateurManager = new UtilisateurManager($db);
 
  	$id = (int)$_GET['id'];
   

    if ( $utilisateurManager->activerCompte($id, 1) == 1)
	{
		header("Location: login.php");
		exit();
	} else {
		echo "error";
	}

