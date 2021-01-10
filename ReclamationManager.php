<?php 

	require_once 'Reclamation.php';

	class ReclamationManager
	{
	
		private $db;

		function __construct($db){
			$this->db=$db;
		}
		public function recupererReclamations()
		{
			$reclamation = [];
			$data = $this->db->query('SELECT * FROM reclamation');
			foreach ($data as $key => $value) {
				array_push($reclamation, new Reclamation($value));
			}

			return $reclamation;
		}
		public function recupererReclamationParId($id)
		{
			$Reclamation=null;

			$data = $this->db->query('SELECT * FROM reclamation WHERE id='.$id);

			foreach($data as $key => $value) {
				$Reclamation = new Reclamation($value);
			}

			return $Reclamation;
		}

		public function supprimerReclamationParId($id)
		{
			$requete=$this->db->prepare('DELETE FROM reclamation WHERE id=:id');
			$requete->bindValue(':id',$id);
			$requete->execute();
		}

		public function insererReclamation(Reclamation $reclamation)
		{
			$requete=$this->db->prepare('INSERT INTO reclamation(titre,message,idUtilisateur,etat) VALUES(:titre,:message,:idUtilisateur,:etat)');
			$requete->bindValue(':titre',$reclamation->getTitre());
			$requete->bindValue(':message',$reclamation->getMessage());
			$requete->bindValue('idUtilisateur',$reclamation->getIdUtilisateur());
			$requete->bindValue('etat',$reclamation->getEtat());
			$requete->execute();
		}
		public function mettreAJourReclamation($id,$titre, $message)
		{
			$requete = $this->db->prepare('UPDATE reclamation SET titre=:titre, message=:message WHERE id=:id');
			$requete->bindValue(':titre',$titre);
			$requete->bindValue(':message',$message);
		    $requete->bindValue(':id',$id);
		    if($requete->execute() && $this->recupererReclamationParId($id) != null) {
			 	echo '<p style="color:green;width:450px; margin:0px auto"><strong> la reclamation n° '. $this->recupererReclamationParId($id)->getId(). ' a été mise à jour avec succès.';

			}else {
			 	echo '<p style="color:red; width:350px; margin:0px auto"><strong> la reclamation d\'identifiant: ' . $id . ' n\'existe pas';
			 }


	   }

	   public function mettreAJourReclamationEtat($id, $etat)
		{
			$requete = $this->db->prepare('UPDATE reclamation SET etat=:etat WHERE id=:id');
			$requete->bindValue(':etat',$etat);
		    $requete->bindValue(':id',$id);
		    $succes = 0;
		    if($requete->execute()) {
			 	$succes = 1;
			}

			return $succes;


	   }
}
	