<?php

	class Region
	{
		private $_listeDepartements;
		private $_code;
		private $_nom;
		
		
		public function __construct($nom, $code) 
		{
			$this->_nom = $nom;
			$this->_code = $code;
		}
		
		public function existeDepartement($nom) 
		{
			return array_key_exists($nom, $this->_listeDepartements);
		}
		
		public function ajouterDepartement($departement) 
		{
			$this->_listeDepartements[$departement->getNom()] = $departement;
		}
		
		public function getListeDepartements()
		{
		    return $this->_listeDepartements;
		}
		
		public function getDepartement($nom)
		{
		    return $this->_listeDepartements[$nom];
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
		    $n = 0;
		    
		    foreach ($this->_listeDepartements as $departement)
		        $n += $departement->getNbVilles();
		    
		        return $n;		    
		}
		
		public function __toString() 
		{
		    return 'Région : ' . $this->_nom . '    Code : ' . $this->_code 
		    . '  Nb dep : ' . count($this->_listeDepartements) 
		    . '  Nb villes : ' . $this->getNbVilles();
		}
	
	}
	
?>	