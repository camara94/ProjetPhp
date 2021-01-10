<?php
	session_start();
   require_once '../ReclamationManager.php';
   require_once '../UtilisateurManager.php';
   require_once '../Connexion.php';
   $db=Connexion();
   $reclamationManager = new ReclamationManager($db);
   $utilisateurManager = new UtilisateurManager($db);
?>
<!DOCTYPE html>
<html>
		<?php include 'entete.php'; ?>
	<body>
		<?php require 'navigation.php';?>
      <div style="margin-top: 25px"></div>
		<div class="container">
         <div class="row">
            <div class="parallax first-section fadeIn">
            <div class="table-respensive">            
               <table class="table table-striped"> 
                  <thead> 
                     <tr> 
                        <th scope="col">Id</th> 
                        <th scope="col">Titre</th> 
                        <th scope="col">Message</th> 
                        <th scope="col">Enseignant</th> 
                        <th scope="col">Action</th>
                        </tr> 
                  </thead> 
                  <tbody> 
                     <?php foreach ($reclamationManager->recupererReclamations() as $reclamation) {?>
                     <?php if(
                              isset($_SESSION['id']) 
                              && $_SESSION['id'] == $utilisateurManager->recupererUtilisateurParId(
                                                      $reclamation->getIdUtilisateur())->getId()
                           ) {?>
                     <tr> 
                        <th scope="row"><?=$reclamation->getId()?></th> 
                        <td><?=$reclamation->getTitre()?></td> 
                        <td><?=$reclamation->getMessage()?></td> 
                        <td>
                           <?=$utilisateurManager->recupererUtilisateurParId(
                                                      $reclamation->getIdUtilisateur()
                                                      )->getPrenom()?></td> 
                        <td>
                           <a href="supprimerReclamation.php?idReclamation=<?=$reclamation->getId()?>"><i class="fa fa-trash fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="modifierReclamation.php?idReclamation=<?=$reclamation->getId()?>"><i class="fa fa-pencil fa-lg"></i></a>
                        </td>
                     </tr> 
                      <?php } ?>
                    <?php } ?>
                  </tbody> 
               </table>
            </div>
         </div>
         </div>   
      </div>
		<?php require 'footer.php'; ?>
	</body>
</html>