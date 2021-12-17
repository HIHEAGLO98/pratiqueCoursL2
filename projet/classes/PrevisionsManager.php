<?php

	class PrevisionsManager
	{
		private $json;
		private $json2;
		private $json3;
		private $ville;
		private $date;
		private $etatActuel;
		private $previsions;
		private $prevGV;
		private $historique;
		private $historique1;


        
        public function __construct($idendifiant, $format) 
		{
            if($idendifiant != "")
            {
    		    $this->json = file_get_contents('http://api.weatherapi.com/v1/forecast.json?key=fc6049caf38449c78ff145938203004&q=' . urlencode($idendifiant) . '&days=10&lang=fr');
    		    
    		    if($this->json !== false)
    		    {
    		        $this->json = json_decode($this->json);
    		        $this->ville = $this->json->location;
    		        $this->etatActuel = $this->json->current;
    		        $this->previsions = $this->json->forecast;
    		        $this->date = $this->previsions->forecastday[0]->date;
    		        //print("La ville de {$this->ville->name} a pour coordonnées {$this->ville->lat}, {$this->ville->lon}.\n");
    		    }
            }
		    switch($format)
		    {
		        case 1:
        		    $this->json2 = file_get_contents('http://api.weatherapi.com/v1/history.json?key=fc6049caf38449c78ff145938203004&q=' . urlencode($idendifiant) . '&dt=' . urlencode($this->date) . '&lang=fr');
        		    
        		    if($this->json2 !== false)
        		    {
        		        $this->json2 = json_decode($this->json2);
        		        $this->historique = $this->json2->forecast->forecastday[0];
        		    }
        		    break;
		        case 2:
		            $this->json2 = file_get_contents('http://api.weatherapi.com/v1/history.json?key=fc6049caf38449c78ff145938203004&q=' . urlencode($idendifiant) . '&dt=' . urlencode($this->date) . '&lang=fr');
		            
		            $this->json3 = file_get_contents('http://api.weatherapi.com/v1/history.json?key=fc6049caf38449c78ff145938203004&q=' . urlencode($idendifiant) . '&dt=' . urlencode($this->previsions->forecastday[1]->date) . '&lang=fr');
		            

		            if($this->json2 !== false)
		            {
		                $this->json2 = json_decode($this->json2);
		                $this->historique = $this->json2->forecast->forecastday[0];
		            }
		            
		            if($this->json3 !== false)
		            {
		                $this->json3 = json_decode($this->json3);
		                $this->historique1 = $this->json3->forecast->forecastday[0];
		            }
		            
		            
		            break;
		        case 3:
		            $this->prevGV = array();
		            $grandesVilles = array("Paris", "Marseille", "Lyon", "Toulouse", "Nice", "Nantes", "Strasbourg", "Bordeaux");
		            
		            foreach($grandesVilles as $gv)
		            {
		                $this->json2 = file_get_contents('http://api.weatherapi.com/v1/current.json?key=fc6049caf38449c78ff145938203004&q=' . urlencode($gv) . '&lang=fr');
		                $this->json2 = json_decode($this->json2);
		                $this->prevGV[$gv] = $this->json2->current;
		            }
		            break;
		        default:
		            break;
		    }
		    
		}
	

		public function afficherEtatActuel()
		{
		    echo '<div id="actuellement" style="width: 100%; display: flex;">';
		    
    		    echo '<div id="descActuel" class="box" style="margin-right: 5px; border: 0px solid white; width: 50%; text-align: center; display: flex; flex-direction: column; align-content: space-between; flex: 1;">';
        		    echo '<div>';
        		        echo '<p style="font-size: xx-large;">' . $this->ville->name . '</p>';
        		        echo '<p style="font-size: x-large;">' . $this->etatActuel->condition->text . '</p>';
            		echo '</div>';
        		    
            		echo '<div style="display: flex; margin: auto;">';
                		echo '<figure style="margin: auto;"><img alt="icone" src="' . $this->etatActuel->condition->icon .'" style="width: 100px; height: 100px;"/></figure>';
                		echo '<p style="font-size: 3.0em; margin: auto; margin-left: 5px; ">' . $this->etatActuel->temp_c . ' °C </p>';
        		    echo '</div>';
        		    
        		    //echo 'Date : ' . $this->ville->localtime . '<br />';
        		    
        		    echo '<div style="display: flex; justify-content: space-around; margin-top : auto">';
            		    echo '<p>';
                		    echo (int)$this->etatActuel->wind_kph . ' km/h <br />';    
                		    echo '<span style="color: rgba(255, 255, 255, 0.5);">VENT (' . $this->etatActuel->wind_dir . ')</span> <br />';
            		    echo '</p>';
            		    
            		    echo '<p>';
                		    echo (int)$this->etatActuel->feelslike_c . '°C <br />';
                		    echo '<span style="color: rgba(255, 255, 255, 0.5);">RESSENTI</span> <br />';
            		    echo '</p>';
            		    
            		    echo '<p>';
                		    echo $this->etatActuel->humidity . '% <br />';
                		    echo '<span style="color: rgba(255, 255, 255, 0.5);">HUMIDITÉ</span> <br />';
            		    echo '</p>';
        		    echo '</div>';
		    
    		    echo '</div>';
    		    
    		    echo '<div id="map" style="border: 1px solid black; width: 400px; height: 400px;">';
    		      echo '<img alt="ville" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $this->ville->lat . ',' . $this->ville->lon . '&size=400x400&zoom=10&&markers=color:blue|' . $this->ville->lat . ',' . $this->ville->lon . '&key=AIzaSyDKVFxWtzC1E-iJHzmx6c_EookiGPWvBaI">';
    		    echo '</div>';
		    
		    echo '</div>';
		    printf("\n");
		}
		
		public function afficherInfoSup()
		{
		    $astro = $this->previsions->forecastday[0]->astro;
		    echo '<div id="infoSup" style="width: 30%; text-align: center; ">';
    		    echo '<p style="text-align: center;">Astro</p>';
    		    echo '<div class="box" style="padding: 6px; text-align: center; ">';
        		    echo '<div style="display: flex; margin: auto;">';
            		    echo '<figure style="margin: auto;"><img alt="icone" src="../images/soleil.png" style="width: 50px; height: 50px;"/></figure>';
            		    echo '<p style="font-size: 1.0em; margin: auto; margin-left: 5px; ">Lever du soleil : ' . date("H:i ",strtotime($astro->sunrise)) . '</p>';
        		    echo '</div>';
        		    
        		    echo '<div style="display: flex; margin: auto;">';
            		    echo '<figure style="margin: auto;"><img alt="icone" src="../images/lune.png" style="width: 50px; height: 50px;"/></figure>';
            		    echo '<p style="font-size: 1.0em; margin: auto; margin-left: 5px; ">Coucher du soleil : ' . date("H:i ",strtotime($astro->sunset)) . '</p>';
        		    echo '</div>';
                    
    		    echo '</div>';
		    echo '</div>';
		    
		    echo '<div id="tendance" style="width: 65%; text-align: center;">';
    		    echo '<p style="text-align: center;">Tendance générale</p>';
    		    echo '<div style="text-align: center; display: flex; justify-content: space-between;">';
    		        $this->prevGeneral();
    		    echo '</div>';
		    echo '</div>';
		}
		
		public function prevGeneral()
		{
		    $tendance = $this->previsions->forecastday[0];
		    
		    echo '<div class="box" style="width: 30%; border: 0px solid white; text-align: center; padding: 5px;">';
		        echo '<p style="margin: auto;">Aujourd\'hui</p>';
		        echo '<div style="display: flex; margin: auto;">';
    		        echo '<figure style="margin: auto;"><img alt="icone" src="' . $tendance->day->condition->icon .'" style="width: 70px; height: 70px"/></figure>';
    		        echo '<p style="margin: auto; margin-left: 2px; "><span style="color: rgba(255, 255, 255, 0.5);">' . (int)$tendance->day->mintemp_c . ' °</span>|'  . (int)$tendance->day->maxtemp_c . ' °</p>';
		        echo '</div>';
		        echo '<p style="margin: auto;">' . $tendance->day->condition->text . '</p>';
		    echo '</div>';
		    
		    $tendance = $this->previsions->forecastday[1];
		    
		    echo '<div class="box" style="width: 30%; border: 0px solid white; text-align: center; padding: 5px;">';
		    echo '<p style="margin: auto;">Demain</p>';
		    echo '<div style="display: flex; margin: auto;">';
		    echo '<figure style="margin: auto;"><img alt="icone" src="' . $tendance->day->condition->icon .'" style="width: 70px; height: 70px"/></figure>';
		    echo '<p style="margin: auto; margin-left: 2px; "><span style="color: rgba(255, 255, 255, 0.5);">' . (int)$tendance->day->mintemp_c . ' °</span>|'  . (int)$tendance->day->maxtemp_c . ' °</p>';
		    echo '</div>';
		    echo '<p style="margin: auto;">' . $tendance->day->condition->text . '</p>';
		    echo '</div>';
		    
		    $tendance = $this->previsions->forecastday[2];
		    
		    echo '<div class="box" style="width: 30%; border: 0px solid white; text-align: center; padding: 5px;">';
		    echo '<p style="margin: auto;">Après-Demain</p>';
		    echo '<div style="display: flex; margin: auto;">';
		    echo '<figure style="margin: auto;"><img alt="icone" src="' . $tendance->day->condition->icon .'" style="width: 70px; height: 70px"/></figure>';
		    echo '<p style="margin: auto; margin-left: 2px; "><span style="color: rgba(255, 255, 255, 0.5);">' . (int)$tendance->day->mintemp_c . ' °</span>|'  . (int)$tendance->day->maxtemp_c . ' °</p>';
		    echo '</div>';
		    echo '<p style="margin: auto;">' . $tendance->day->condition->text . '</p>';
		    echo '</div>';
		    
		}
		
		public function afficherPrevisionsHoraire()
		{	    
		    echo '<p style="text-align: center;">Aujourd\'hui</p>';
		    echo '<div class="prevHoraire box" style="border: 0px solid white; text-align: center; display: flex; overflow: auto;">';
		    
		    for($i = 0 ; $i < 24 ; $i++)
		        $this->prevHoraire($this->historique->hour[$i]);
		    
		    echo '</div>';
		}
		
		public function afficherPrevisionsHoraire48h()
		{
		    echo '<p style="text-align: center;">Aujourd\'hui</p>';
		    echo '<div class="prevHoraire box" style="border: 0px solid white; text-align: center; display: flex; overflow: auto;">';
		    
		    for($i = 0 ; $i < 24 ; $i++)
		        $this->prevHoraire($this->historique->hour[$i]);
		        
		    echo '</div>';
		        
	        echo '<p style="text-align: center;">Demain</p>';
	        echo '<div class="prevHoraire box" style="border: 0px solid white; text-align: center; display: flex; overflow: auto;">';
	        
	        for($i = 0 ; $i < 24 ; $i++)
	            $this->prevHoraire($this->historique1->hour[$i]);
	            
            echo '</div>';
            
		}
		
		public function prevHoraire($heure)
		{
		    echo '<div class="horaire" style="border: 0px solid white; text-align: center; display: flex; flex: 1; flex-direction: column; align-content: space-between;">';
		    
    		    echo '<p>' . substr($heure->time, -5, 2) . 'h</p>';
    		    echo '<img alt="icone" src="' . $heure->condition->icon .'" style="width: 50px; height: 50px"/>';
    		    echo '<p>' . (int)$heure->temp_c . '°</p>';
    		    echo '<p style="font-size: small;">' . (int)$heure->wind_kph . '<span style="color: rgba(255, 255, 255, 0.5); font-size: x-small;"> km/h</span></p>';
    		    echo '<p>' . $heure->wind_dir . '</p>';

		    echo '</div>';
		}
		
		public function afficherPrevGV()
		{
		    echo '<h5 style="text-align: center; margin-bottom: 2px;">Grandes villes</h5>';
		    echo '<div id="prevGV" class="box" style="border: 0px solid white; text-align: center; display: flex; flex-wrap: wrap;">';
		    
		    $grandesVilles = array("Paris", "Marseille", "Lyon", "Toulouse", "Nice", "Nantes", "Strasbourg", "Bordeaux");
		    
		    foreach ($grandesVilles as $gv) 
		        $this->prevGV($gv);
		    
		    echo '</div>'; 
		}
		
		public function prevGV($gv)
		{
		    $etatActuelGV = $this->prevGV[$gv];
		    
		    echo '<div class="grandeVille" style="width: 50%; margin-top: 5px; border: 0px solid white; text-align: center; display: flex; flex-direction: column; ">';
		    echo '<p style="margin: auto;">' . $gv . '</p>';
		    
		    echo '<div style="display: flex; margin: auto;">';
		    echo '<figure style="margin: auto;"><img alt="icone" src="' . $etatActuelGV->condition->icon .'" style="width: 50px; height: 50px"/></figure>';
		    echo '<p style="margin: auto; margin-left: 5px; ">' . (int)$etatActuelGV->temp_c . ' °C </p>';
		    echo '</div>';
		    
		   		    
		    echo '</div>';
		}
		
		public function afficherDernVille()
		{		    
		    echo '<h5 style="text-align: center; margin-bottom: 2px;">Dernière ville consultée</h5>';
		    echo '<div id="derniereVille" class="box" style="border: 0px solid white; text-align: center; display: flex; padding: 5px;">';
    		    echo '<p style="margin: auto;">' . $this->ville->name . '</p>';
    		    
    		    echo '<div style="width: 65%;">';
        		    echo '<div style="display: flex; margin: auto;">';
        		    echo '<figure style="margin: auto;"><img alt="icone" src="' . $this->etatActuel->condition->icon .'" style="width: 70px; height: 70px"/></figure>';
        		    echo '<p style="margin: auto; margin-left: 2px; ">' . (int)$this->etatActuel->temp_c . ' °C </p>';
        		    echo '</div>';
        		    echo '<p style="margin: auto;">' . $this->etatActuel->condition->text . '</p>';
        		echo '</div>';
		    echo '</div>';
		}
		
		public function getVille()
		{
		    return $this->ville;
		}

		public function getEtatActuel()
		{
		    return $this->etatActuel;
		}
		
		public function getPrevisions()
		{
		    return $this->previsions;
		}
		
	
	
	}
	
?>	