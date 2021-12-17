<?php
	require "Region.php";
	
	class MeteoManager
	{
		private static $_donneesVDR;
		
		private $listeRegions;
		
		public function __construct() 
		{
			$this->listeRegions = array();
			if(self::$_donneesVDR == null)
			    self::remplirDonneesVDR();
			
			$this->trierDonnees();
			
			//echo "<br />";
			//echo "<br />";
			//foreach($this->listeRegions as $region)
				//echo $region . "<br />";
		}
		
	
		public static function remplirDonneesVDR()
		{
		    self::$_donneesVDR = array();
			$fichierCSV = fopen($_SERVER['DOCUMENT_ROOT'] . '/projet/classes/vdr1.csv', "r");
			
			$data = fgets($fichierCSV);
			
			while(($data = fgetcsv($fichierCSV, 1000, ";")) != null) 
			{
				$data = array_map("utf8_encode", $data); 
				//$_donneesVDR[$data[3]] = $data;
				array_push(self::$_donneesVDR, $data);

				//print_r($data);
				//echo "<br />";
			}
			
			fclose($fichierCSV);
		
		}
		
		public function trierDonnees()
		{
		    foreach(self::$_donneesVDR as $data)
		    {
		        if(!$this->existeRegion($data[7]) && $data[7] != "")
		        {
		            $region = new Region($data[7], $data[6]);
		            $departement = new Departement($data[5], $data[4]);
		            $ville = new Ville($data[3], $data[1], $data[8], $data[9], $data[10]);
		            
		            $departement->ajouterVille($ville);
		            $region->ajouterDepartement($departement);
		            $this->ajouterRegion($region);
		        }
		        else if($data[7] != "")
		        {
		            
		            $region = $this->getRegion($data[7]);
		            
		            if(!$region->existeDepartement($data[5]) && $data[5] != "")
		            {
		                $departement = new Departement($data[5], $data[4]);
		                $ville = new Ville($data[3], $data[1], $data[8], $data[9], $data[10]);
		                
		                $departement->ajouterVille($ville);
		                $region->ajouterDepartement($departement);
		            }
		            
		            else 
		            {
		                $departement = $region->getDepartement($data[5]);
		                
		                if(!$departement->existeVille($data[3]) && $data[3] != "")
		                {
		                    $ville = new Ville($data[3], $data[1], $data[8], $data[9], $data[10]);
		                    $departement->ajouterVille($ville);
		                }
		            }
		            
		        }
		        		        
		    }
		}
		
		public function getListeRegions() 
		{
			return $this->listeRegions;
		}
		
		public function getRegion($nom) 
		{
		    return $this->listeRegions[$nom];
		}
		
		public function existeRegion($nom) 
		{
			return array_key_exists($nom, $this->listeRegions);
		}
		
		public function ajouterRegion($region) 
		{
			$this->listeRegions[$region->getNom()] = $region;
		}
		
		
	
	
	}


?>