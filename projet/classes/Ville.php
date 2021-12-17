<?php

	class Ville
	{
		private $codePostal;
		private $insee;
		private $nom;
		private $lat;
		private $lon;
		
		
		public function __construct($nom, $codePostal, $insee, $lat, $lon) 
		{
			$this->nom = $nom;
			$this->codePostal = $codePostal;
			$this->insee = $insee;
			$this->lat = $lat;
			$this->lon = $lon;
		}
	
		public function getNom() 
		{
			return $this->nom;
		}
		
		public function getCode() 
		{
			return $this->codePostal;
		}
		
		public function getInsee()
		{
		    return $this->insee;
		}
		
		public function getLat()
		{
		    return $this->lat;
		}
		
		public function getLon()
		{
		    return $this->lon;
		}
		
		
		public function __toString() 
		{
		    return 'Ville : ' . $this->nom . ' Code postal : ' . $this->codePostal . ' Insee : ' . $this->insee;
		}
	
	}
	
?>	