<?php

	require 'UtilisateurManager.php';
	require 'Connexion.php';
	require'ReclamationManager.php';

	$db = Connexion();

	$um = new UtilisateurManager($db);

	$u = $um->recupererUtilisateurParId(4);
	$uu=$um->recupererParNom("Touré");

	$data = ['nom'=>'Traoré','prenom'=>'Macky','mail'=>'macky@gmail.com','telephone'=>'+216536857','fonction'=>'Enseignant'];
	$data2=['titre'=>'titre3','message'=>'message3','idUtilisateur'=>5,'etat'=>0];

	$user = new Utilisateur($data);

	//$um->mettreAJourUtilisateur(6, '654788jhgf');
	//$um->supprimer(1);
	$rm=new ReclamationManager($db);
	var_dump($rm->recupererUtilisateurParId(1));
	$r=new Reclamation($data2);
	$rm->ajouterReclamation($r);
	$rm->mettreAJourReclamation(1,"jai modifier");


?>