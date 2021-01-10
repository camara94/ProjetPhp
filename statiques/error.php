<?php
session_start();
include 'entete.php'; 

$var_inter = strstr($_SESSION['compte_existe'], "entry");
echo $var_inter . "<br>";
$var_inter = explode(' ', $var_inter)[1];

$mail_existe = substr($var_inter, 1, strpos($var_inter, "-")-1);


require 'navigation.php';?>

<div class="row" style="margin-top:220px;">
 
  <div class="col-sm-8 col-sm-offset-2">
        <div class="thumbnail">
          <div class="caption text-center">
           
            
            <p><i class="glyphicon glyphicon-user light-red lighter bigger-120"></i>&nbsp;Utilisateur</p>
            <div class="thumbnail-description smaller"> Il y'a un utilisateur avec cet <strong><?=$mail_existe;?></strong></div>
          </div>
          <div class="caption card-footer text-center">
            <ul class="list-inline">
              <li><a href="inscription.php"><i class="glyphicon glyphicon-user"></i>&nbsp;S'inscrire</a></li>
            </ul>
          </div>
        </div>
      </div>
 
</div>




<?php 
		require 'footer.php';

?>