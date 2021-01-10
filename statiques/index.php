<?php
	session_start();
   if(!isset($_SESSION['nom']) || empty($_SESSION['nom'])){
         header('Location: login.php');
   }
?>
<!DOCTYPE html>
<html>
		<?php include 'entete.php'; ?>
	<body>
		<?php require 'navigation.php';?>
		<div id="home" class="parallax first-section fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('images/ti.jpg');">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="text-contant">
                     <h2>
                        <span class="center"><span class="icon"><img src="images/logo-iset.jpg" alt="#" /></span></span>
                        <a href="" class="typewrite" data-period="2000" 
                        data-type='[ "Bienvenue à l&apos;ISET Djerba", "We Care Your Health", "We are Expert!" ]'>
                        <span class="wrap"></span>
                        </a>
                     </h2>
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
		<?php require 'footer.php'; ?>
	</body>
</html>