<header>
         <div class="header-top wow fadeIn">
            <div class="container">
               <a class="navbar-brand" href="index.html">
                  <img src="images/logo-iset.jpg" height="80" width="80" alt="image">
               </a>
               <div class="right-header">
                  <div class="header-info">
                     <div class="info-inner">
                        <span class="icontop"><img src="images/phone-icon.png" alt="#"></span>
                        <span class="iconcont"><a href="tel:32165478">+216 32165478</a></span>	
                     </div>
                     <div class="info-inner">
                        <span class="icontop"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <span class="iconcont"><a data-scroll href="mailto:iset@tech.gmail.fr">iset@tech.gmail.fr</a></span>	
                     </div>
                     <div class="info-inner">
                        <span class="icontop"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        <span class="iconcont"><a data-scroll href="#">Heure d'ouverture: 8:30 - 16:00</a></span>	
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom wow fadeIn">
            <div class="container">
               <nav class="main-menu">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
                  </div>
				  
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li><a class="active" href="index.php">Accueil</a></li>
                        <?php if(isset($_SESSION['fonction']) && $_SESSION['fonction'] =='Enseignant') {?>
                           <li><a data-scroll href="listeReclamation.php">Services</a></li> 
                        <?php } else if(!isset($_SESSION['id']) || empty($_SESSION['id'])) { ?>
                             <li><a data-scroll href="index.php">Services</a></li> 
                         <?php } else { ?>
                           <li><a data-scroll href="listeReclamationTech.php">Services</a></li> 
                        <?php } ?>
                        <li style="display: none"><a data-scroll href="#doctors">Techniciens</a></li>
                        <?php if(isset($_SESSION['fonction']) && $_SESSION['fonction'] =='Enseignant') { ?>
						         <li><a data-scroll href="form-reclamation.php">Reclamations</a></li>
                        <?php } ?>
                        <?php if(empty($_SESSION['nom'])) { ?>
                           <li><a data-scroll href="inscription.php">S'inscrire</a></li>
                        <?php } ?>
                        <?php if (empty($_SESSION['nom'])) {?>
                           <li><a data-scroll href="login.php">Se connecter</a></li>
                        <?php } else {?>
                           <li><a data-scroll href="deconnection.php">Deconnecter</a></li>
                        <?php } ?>
                        <?php if(isset($_SESSION['nom']) && !empty($_SESSION['nom'])) { ?><li><a data-scroll href="index.php"><i class="fa fa-user fa-lg">&nbsp;<?=$_SESSION['nom']?></i></a></li> <?php } ?>
                     </ul>
                  </div>
               </nav>
               <!--div class="serch-bar col-2">
                  <div id="custom-search-input">
                     <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" placeholder="Search" />
                        <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        </span>
                     </div>
                  </div>
               </div-->
            </div>
         </div>
      </header>