<?php

	class Departement
	{
		private $_listeVilles;
		private $_code;
		private $_nom;
		
		
		public function __construct($nom, $code) 
		{
			$this->_nom = $nom;
			$this->_code = $code;
		}
		
		public function existeVille($nom) 
		{
			return array_key_exists($nom, $this->_listeVilles);
		}
		
		public function ajouterVille($ville) 
		{
		    $this->_listeVilles[$ville->getNom()] = $ville;
		}
	
		public function getListeVilles()
		{
		    return $this->_listeVilles;
		}
		
		public function getVille($nom)
		{
		    return $this->_listeVilles[$nom];
		}
		
		public function getNom() 
		{
			return $this->_nom;
		}
		
		public function getCode() 
		{
			return $this->_code;
		}
		
		public function getNbVilles()
		{
		    return count($this->_listeVilles);		    
		}
		
		public function __toString() 
		{
			return 'Département : ' . $this->_nom . ' Code : ' . $this->_code
			. '  Nb villes : ' . $this->getNbVilles();
		}
	}
	
?>	