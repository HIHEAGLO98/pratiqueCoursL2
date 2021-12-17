<?php
	function afficheDate($langue = "fr")
	{
		$j_fr = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
		$m_fr = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
		$j_en = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$m_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		
		if($langue == "en")
			return $j_en[date('N') - 1] . ', ' . $m_en[date('n') - 1] . date(' j') . ', ' . date('Y');
		else
			return $j_fr[date('N') - 1] . date(' j ')  . $m_fr[date('n') - 1] . date(' Y');
		
	}
	
	function get_navigateur() 
	{
		$infoNav = $_SERVER['HTTP_USER_AGENT'];
		$nav = "Inconnu";
		
		if(strpos($infoNav, 'Opera'))
			$nav = "Opera";
		elseif (strpos($infoNav, 'Edge')) 
			$nav = "Microsoft Edge";
		else if(strpos($infoNav, 'Chrome'))
			$nav = "Google Chrome";
		elseif (strpos($infoNav, 'Safari')) 
			$nav = "Safari";
		else if(strpos($infoNav, 'Firefox'))
			$nav = "Mozilla Firefox";
		elseif (strpos($infoNav, 'MSIE')) 
			$nav = "Internet Explorer";
			
		return $nav;
	}
	
	function get_visites($nom = '')
	{
	    $f = fopen($_SERVER['DOCUMENT_ROOT'] . '/projet/sources/Visites.txt', "r+");
				
		$visites = fgets($f);
		$visites += 1;
		
		fseek($f, 0);
		fputs($f, $visites);
		
		
		fclose($f);
		
		return $visites;
	}
	
	
	
	function get_stats($nom)
	{
	    if(($nom)==("La Réunion")) {
	        $st = fopen("../sources/reunion.txt", "r+");
	        
	        $v = fgets($st);
	        $v += 1;
	        
	        fseek($st, 0);
	        fputs($st, $v);
	        
	        
	        fclose($st);
	    }
	    else if(($nom)==("Provence-Alpes-Côte d'Azur")) {
	        $st = fopen("../sources/Provence.txt", "r+");
	        $v = fgets($st);
	        $v += 1;
	        
	        fseek($st, 0);
	        fputs($st, $v);
	        
	        
	        fclose($st);
	    }
	    else if(($nom)==("Île-de-France")) {
	        $st = fopen("../sources/ile.txt", "r+");
	        $v = fgets($st);
	        $v += 1;
	        
	        fseek($st, 0);
	        fputs($st, $v);
	        
	        
	        fclose($st);
	    }
	    else if(($nom)==("Auvergne-Rhône-Alpes")) {
	        $st = fopen("../sources/Auvergne.txt", "r+");
	        $v = fgets($st);
	        $v += 1;
	        
	        fseek($st, 0);
	        fputs($st, $v);
	        
	        
	        fclose($st);
	    }
	    else if(($nom)==("Bourgogne-Franche-Comté")) {
	        $st = fopen("../sources/Bourgogne.txt", "r+");
	        $v = fgets($st);
	        $v += 1;
	        
	        fseek($st, 0);
	        fputs($st, $v);
	        
	        
	        fclose($st);
	    }
	    else {
	        
	        $st = fopen("../sources/$nom.txt", "r+");
	        $v = fgets($st);
	        $v += 1;
	        
	        fseek($st, 0);
	        fputs($st, $v);
	        
	        
	        fclose($st);
	    }
	}
	
	function get_stat($nom)
	{
	    if(($nom)==("La Réunion")) {
	        $st = fopen("../sources/reunion.txt", "r+");
	        
	        
	        $v = fgets($st);
	        
	        fclose($st);
	        
	        return $v;
	    }
	    else if(($nom)==("Provence-Alpes-Côte d'Azur")) {
	        $st = fopen("../sources/Provence.txt", "r+");
	        
	        
	        $v = fgets($st);
	        
	        fclose($st);
	        
	        return $v;
	    }
	    else if(($nom)==("Île-de-France")) {
	        $st = fopen("../sources/ile.txt", "r+");
	        
	        
	        $v = fgets($st);
	        
	        fclose($st);
	        
	        return $v;
	    }
	    else if(($nom)==("Auvergne-Rhône-Alpes")) {
	        $st = fopen("../sources/Auvergne.txt", "r+");
	        
	        
	        $v = fgets($st);
	        
	        fclose($st);
	        
	        return $v;
	    }
	    else if(($nom)==("Bourgogne-Franche-Comté")) {
	        $st = fopen("../sources/Bourgogne.txt", "r+");
	        
	        
	        $v = fgets($st);
	        
	        fclose($st);
	        
	        return $v;
	    }
	    else {
	        
	        
	        $st = fopen("../sources/$nom.txt", "r+");
	        
	        
	        $v = fgets($st);
	        
	        fclose($st);
	        
	        return $v;
	    }
	}
	
?>	