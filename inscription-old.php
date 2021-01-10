<?php require '../UtilisateurManager.php';
	  require '../Connexion.php';

?>

<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login for Form 1</h3>
                    <form method="POST" action="enregistrerUtilisateur.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Login for Form 2</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                        </div>
                    </form>
                </div>
            </div>
 </div>

<!--!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<form method="post" action="" >
			<tr><td> <label>Nom:</label><input type="text" name="nom"></td></tr>
			<tr><td> <label>Prenom:</label><input type="text" name="prenom"></td></tr>
			<tr><td> <label>Email:</label><input type="email" name="mail"></td></tr>
			<tr><td> <label>Telephone:</label><input type="text" name="telephone"></td></tr>
			<tr><td> <label>Mot De Passe:</label><input type="password" name="motDePasse"></td></tr>
			<tr><td> <label>Fonction:</label><input type="text" name="fonction"></td></tr>
		    <tr><td> <input type="submit" value="envoyer" ></td></tr>

	  </form>
	</table>



</body>
</html-->

<?php

$db=Connexion();
$users=new UtilisateurManager($db);
$user1=new Utilisateur($_POST);
var_dump($user1);
if($user1->getNom()!=null && $user1->getPrenom()!=null &&$user1->getMail()!=null && $user1->getTelephone()!=null&& $user1->getMotDePasse()!=null && $user1->getFonction()!=null){
	$GLOBALS['user1'] = null; $user1=null;
 //$users->insererUtilisateur($user1);
}






?>