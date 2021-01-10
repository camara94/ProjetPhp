<?php
session_start();
require '../ReclamationManager.php';
require '../Connexion.php';

$db=Connexion();
$reclamationManager=new ReclamationManager($db);

echo $_GET['idReclamation'];

$rec = $reclamationManager->recupererReclamationParId($_GET['idReclamation']);

if( $rec != null ) {
    $reclamationManager->supprimerReclamationParId($_GET['idReclamation']);
     header("Location: listeReclamation.php");
     exit();
}

?>