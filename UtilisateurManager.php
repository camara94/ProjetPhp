<?php
	session_start();
	require_once 'Utilisateur.php';

	/**
	 * 
	 */
	class UtilisateurManager
	{
		private $db;
		function __construct($db)
		{
			$this->db = $db;
		}

		public function recupererUtilisateurs()
		{
			$utilisateurs = [];

			
			try
			{
				$data = $this->db->query('SELECT * FROM Utilisateur');
				foreach ($data as $key => $value) {
					array_push($utilisateurs, new Utilisateur($value));
				}
			}
			catch (PDOException $e) {
					//$_SESSION['compte_existe'] = $e->getMessage();
					//header("Location: login.php");
					exit();
			}

			return $utilisateurs;
		}


		public function recupererUtilisateurParId($id)
		{
			$utilisateur=null;

			
			try{
				$data = $this->db->query('SELECT * FROM utilisateur WHERE id='.$id);
				foreach($data as $key => $value) {
					$utilisateur = new Utilisateur($value);
				}
			}
			catch (PDOException $e) {
						//$_SESSION['compte_existe'] = $e->getMessage();
						//header("Location: login.php");
						//exit();
			}

			return $utilisateur;
		}

		public function recupererUtilisateurParEmail($mail)
		{
			$utilisateur=null;

			try {
				$data = $this->db->query('SELECT * FROM Utilisateur WHERE mail=\''.$mail.'\'');
				foreach($data as $key => $value) {
					$utilisateur = new Utilisateur($value);
				}
			}
			catch (PDOException $e) {
					//$_SESSION['compte_existe'] = $e->getMessage();
					//header("Location: index.php");
					exit();
			}

			return $utilisateur;
		}


		public function login($mail, $motDePasse)
		{
			$utilisateur=null;
			try{
				$data = $this->db->query('SELECT * FROM Utilisateur WHERE mail=\''.$mail.'\' AND motDePasse=\''.md5($motDePasse).'\'');
				foreach($data as $key => $value) {
					$utilisateur = new Utilisateur($value);
				}
			}catch (PDOException $e) {
					//$_SESSION['compte_existe'] = $e->getMessage();
					//header("Location: index.php");
					exit();
			}

			return $utilisateur;
		}

		public function recupererParNom($nom)
		{
			$utilisateur=null;
			
			try {
				$data = $this->db->query('SELECT * FROM Utilisateur WHERE nom=\''.$nom.'\'');
				foreach ($data as $key => $value) {
					$utilisateur=new utilisateur($value);
				}
			} catch (PDOException $e) {
					//$_SESSION['compte_existe'] = $e->getMessage();
					//header("Location: index.php");
					exit();
			}
			return $utilisateur;

		}


		public function insererUtilisateur(Utilisateur $user)
		{
			
			try {
				$requete = $this->db->prepare('INSERT INTO utilisateur(nom, prenom, mail, telephone,motDePasse, fonction) VALUES(:nom, :prenom, :mail, :telephone,:motDePasse, :fonction)');
			$requete->bindValue(':nom', $user->getNom());
			$requete->bindValue(':prenom', $user->getPrenom());
			$requete->bindValue(':mail', $user->getMail());
			$requete->bindValue(':telephone', $user->getTelephone());
			$requete->bindValue(':motDePasse', md5($user->getMotDePasse()));
            $requete->bindValue(':fonction', $user->getFonction());
				if($requete->execute()) {
					echo '<p style="color:green;width:450px; margin:0px auto"><strong> l\'utilisateur '. $this->recupererParNom($user->getNom())->getPrenom(). ' a été ajouter avec succès.';
				} 
			} catch (PDOException $e) {
					$_SESSION['compte_existe'] = $e->getMessage();
					header("Location: error.php");
					exit();
			}

			return $this->recupererUtilisateurParEmail($user->getMail());
		}

		public function activerCompte($id, $active)
		{
			$requete = $this->db->prepare('UPDATE utilisateur SET active=:active WHERE id=:id');
			$requete->bindValue(':active',$active);
			$requete->bindValue(':id',$id);
			 if($requete->execute() && $this->recupererUtilisateurParId($id) != null) {
			 	echo '<p style="color:green;width:450px; margin:0px auto"><strong> l\'utilisateur '. $this->recupererUtilisateurParId($id)->getPrenom(). ' a été mise à jour avec succès.';
			 } else {
			 	echo '<p style="color:red; width:350px; margin:0px auto"><strong> l\'utilisateur d\'identifiant: ' . $id . ' n\'existe pas';
			 }
		}

		public function mettreAJourUtilisateur($id, $motDePasse)
		{
			$requete = $this->db->prepare('UPDATE utilisateur SET motDePasse=:motDePasse WHERE id=:id');
			$requete->bindValue(':motDePasse',$motDePasse);
			$requete->bindValue(':id',$id);
			 if($requete->execute() && $this->recupererUtilisateurParId($id) != null) {
			 	echo '<p style="color:green;width:450px; margin:0px auto"><strong> l\'utilisateur '. $this->recupererUtilisateurParId($id)->getPrenom(). ' a été mise à jour avec succès.';
			 } else {
			 	echo '<p style="color:red; width:350px; margin:0px auto"><strong> l\'utilisateur d\'identifiant: ' . $id . ' n\'existe pas';
			 }
		}

		public function supprimer($id)
		{
			$requete = $this->db->prepare('DELETE FROM utilisateur WHERE id=:id');
			$requete->bindParam(':id',$id);
			$user=$this->recupererUtilisateurParId($id);
			if($requete->execute() && $user!=null){
				echo '<p style="color:green;width:450px; margin:0px auto"><strong> l\'utilisateur '. $user->getPrenom(). ' a été supprimé avec succès.';
			}else{
				echo '<p style="color:red; width:350px; margin:0px auto"><strong> l\'utilisateur d\'identifiant: ' . $id . ' n\'existe pas';
			}
		}
	}


?>