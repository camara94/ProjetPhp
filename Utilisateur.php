<?php

 	/**
 	 * 
 	 */
 	class Utilisateur 
 	{
 		private $id;
 		private $nom;
 		private $prenom;
 		private $mail;
 		private $telephone;
 		private $motDePasse;
 		private $fonction;
 		private $active;

 		//Constructeur
 		public function __construct(array $data)
 		{
 			$this->hydrate($data);
 		}

 		public function hydrate(array $data)
 		{
 			foreach ($data as $key => $value) {
 				$methode = 'set'.ucfirst($key);
 				if ( method_exists($this, $methode) ) {
 					$this->$methode($value);
 				}
 			}
 		}

 		//Getters
 		public function getId()
 		{
 			return $this->id;
 		}

 		public function getNom()
 		{
 			return $this->nom;
 		}
 		public function getPrenom()
 		{
 			return $this->prenom;
 		}
 		public function getMail()
 		{
 			return $this->mail;
 		}
 		public function getTelephone()
 		{
 			return $this->telephone;
 		}
 	    public function getMotDePasse()
 		{
 			return $this->motDePasse;
 		}
 		public function getFonction()
 		{
 			return $this->fonction;
 		}
 		public function getActive()
 		{
 			return $this->active;
 		}

 		//Setters
 		public function setId($id)
 		{
 			$id = (int)$id;
 			if( is_int($id) )
 				$this->id = $id;
 		    else
 		      echo "veuillez entrer un nombre";
 		}

 		public function setNom($nom)
 		{
 			$this->nom = $nom;
 		}

 		public function setPrenom($prenom)
 		{
 			$this->prenom = $prenom;
 		}

 		public function setMail($mail)
 		{
 			$this->mail = $mail;
 		}

 		public function setTelephone($telephone)
 		{
 			$this->telephone = $telephone;
 		}
 	     public function setMotDePasse($motDePasse)
 		{
 			$this->motDePasse=$motDePasse;
 		}

 		public function setFonction($fonction)
 		{
 			$this->fonction = $fonction;
 		}
 		public function setActive($active)
 		{
 			$this->active = $active;
 		}
 	}
?>








