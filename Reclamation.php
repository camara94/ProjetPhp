<?php
	/**
	 * 
	 */
	class Reclamation
	{
		private $id;
		private $titre;
		private $message;
		private $idUtilisateur;
		private $etat;

		public function __construct(array $data)
		{
			$this->hydrate($data);
		}

		public function hydrate(array $data)
		{
			foreach ($data as $key => $value) {
				$methode = 'set'.ucfirst($key);

				if (method_exists($this, $methode)) {
					
					$this->$methode($value);
				}
			}
		}

		public function getId()
		{
			return $this->id;
		}
		 public function getTitre()
		{
			return $this->titre;
		}
		 public function getMessage()
		{
			return $this->message;
		}
		 public function getIdUtilisateur()
		{
			return $this->idUtilisateur;
		}
		 public function getEtat()
		{
			return $this->etat;
		}

		public function setId($id)
		{
			$this->id=$id;
		}
		public function setTitre($titre)
		{
			$this->titre=$titre;
		}
		public function setMessage($message)
		{
			$this->message=$message;
		}
		public function setIdUtilisateur($idUtilisateur)
		{
			$this->idUtilisateur=$idUtilisateur;
		}
		public function setEtat($etat)
		{
			$this->etat=$etat;
		}
	}