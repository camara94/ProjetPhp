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
                     <tr> 
                        <th scope="row"><?=$reclamation->getId()?></th> 
                        <td><?=$reclamation->getTitre()?></td> 
                        <td><?=$reclamation->getMessage()?></td> 
                        <td>
                           
                              <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])){ 
                                 echo $utilisateurManager->recupererUtilisateurParId($_SESSION['id']
                                                      )->getPrenom();
                              } ?>
                           </td> 
                        <td>
                           <?php if($reclamation->getEtat() == 0) {?>
                           <a href="traiterReclamation.php?idReclamation=<?=$reclamation->getId()?>&idUtilisateur=<?=$_SESSION['id']?>">
                              <strong>en cours ...</strong> </a>
                           <?php } else {?>
                              <strong>trainter</strong>
                           <?php } ?>
                        </td>
                     </tr> 
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