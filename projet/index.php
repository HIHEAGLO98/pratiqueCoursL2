<?php 
    session_start();
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Projet météo page d'acceuil" />
        <meta name="author" content="Francoise-de-Salles Tomegah/ Daniel François" />
		<link rel="shortcut icon" href="images/logo.png" type="image/x-icon"/>
        <link rel="stylesheet" href="styles/style1.css" />
        
        <title>Météo : Page d'Accueil</title>
        
    </head>
    
    <body>
    	<header>
    		<a href="index.php"><img src="images/logo.png" alt="Logo" /></a>
    		<div id="entete">
    			<h1>
    				FD Météo<br /> 
    				Prévisions météorologiques
    			</h1>
    
    			<nav id="menu">
    				<ul>
    					<li><a href="index.php">ACCUEIL</a></li>
    					<li><a href="sources/statistiques.php">STATISTIQUES</a></li>
    				</ul>
    			</nav>
    		</div>
    	</header>
    
    	<h2 style="color: white">Sélection de la région</h2>
    		
    		<?php
                include ("include/util.inc.php");
                
                function chargerClasse($classe)
                {
                    require 'classes/' . $classe . '.php';
                }
                spl_autoload_register("chargerClasse");
            ?>
    
    	<section id="contenu">
    		<nav id="menu2">
    			<h3>Actuellement</h3>
    			        			
    			<?php 
    			    date_default_timezone_set('Europe/Paris');
    			    echo '<p style="font-size: 1.5em;">' .afficheDate() . date(" H:i") . '</p>';
    			    $dernVille = "";
    			
    				if(isset($_COOKIE['derniereVille']))
    				    $dernVille = $_COOKIE['derniereVille'];
    				else 
    				    echo "<p>Pas de recherche dernièrement</p>";
    				
    			?>
    			<div>
    				<?php 
    				    $GVmanager = new PrevisionsManager($dernVille, 3);
    				    
    				    if($dernVille != "")
    				        $GVmanager->afficherDernVille();
    				    
    				    $GVmanager->afficherPrevGV();
    				    
    				    $_SESSION['GVM'] = serialize($GVmanager);
    				?>
    			</div>
    		</nav>
    
    		<section id="corps">
    			<div>
    				<p>
    					Cliquez sur une région pour la sélectionner :
    				</p>
    				<br />
    				
    				        
    				        					
    				<div>
    					<img class="box" src="images/carte-france.png" alt="Carte" usemap="#france-map" style="width: 750px; height: 750px;" />                     
                        
                        <map name="france-map">
                            <area target="" alt="Hauts-de-France" title="Hauts-de-France" href="sources/selection.php?region=<?php echo urlencode("Hauts-de-France") ?>" coords="312,58,276,69,274,110,267,120,281,141,279,163,283,172,279,177,283,178,293,175,305,177,318,184,336,182,349,196,360,189,361,175,360,166,373,165,377,148,384,139,380,108,360,105,353,95,342,93,336,76,325,81,315,71" shape="poly">
                            <area target="" alt="Bretagne" title="Bretagne" href="sources/selection.php?region=<?php echo urlencode("Bretagne") ?>" coords="162,217,163,248,152,259,143,258,117,270,111,277,99,281,67,262,37,248,23,250,9,237,26,230,23,214,4,215,10,203,40,193,57,201,77,188,97,209,141,209" shape="poly">
                            <area target="" alt="Normandie" title="Normandie" href="sources/selection.php?region=<?php echo urlencode("Normandie") ?>" coords="265,122,279,141,276,162,279,170,274,182,266,184,270,194,242,206,243,225,238,238,217,221,202,225,199,216,164,217,148,208,130,139,154,141,162,163,219,160,215,145" shape="poly">
                            <area target="" alt="Grand Est" title="Grand Est" href="sources/selection.php?region=<?php echo urlencode("Grand Est") ?>" coords="350,225,351,197,361,188,361,170,375,165,385,139,383,128,406,114,408,138,433,151,474,156,485,172,547,182,535,203,525,267,519,279,510,278,504,261,464,246,447,258,446,267,419,268,404,249,388,256,369,251" shape="poly">
                            <area target="" alt="Île-de-France" title="Île-de-France" href="sources/selection.php?region=<?php echo urlencode("Île-de-France") ?>" coords="284,225,272,208,269,184,277,177,288,179,298,177,310,180,318,184,332,184,348,196,346,225,332,228,332,237,325,244,310,242,307,230,289,233" shape="poly">
                            <area target="" alt="Pays de la Loire" title="Pays de la Loire" href="sources/selection.php?region=<?php echo urlencode("Pays de la Loire") ?>" coords="97,285,143,260,151,261,164,250,164,218,194,218,203,226,214,222,240,242,231,269,214,275,207,301,199,307,167,313,171,322,178,353,164,354,149,354,124,339,110,319,119,308,111,297,119,293,103,292" shape="poly">
                            <area target="" alt="Centre-Val de Loire" title="Centre-Val de Loire" href="sources/selection.php?region=<?php echo urlencode("Centre-Val de Loire") ?>" coords="209,301,216,275,234,271,245,242,244,229,245,225,244,207,269,196,270,207,290,236,308,233,309,244,325,246,332,242,337,254,327,268,337,324,301,351,257,353,234,316,217,317" shape="poly">
                            <area target="" alt="Bourgogne-Franche-Comté" title="Bourgogne-Franche-Comté" href="sources/selection.php?region=<?php echo urlencode("Bourgogne-Franche-Comté") ?>" coords="467,346,458,357,442,357,435,347,417,341,410,362,394,358,389,366,375,364,376,347,361,332,340,335,340,325,328,268,338,255,333,237,333,229,349,228,368,254,386,257,403,251,418,271,449,269,450,260,464,247,501,262,507,276,504,287,489,310" shape="poly">
                            <area target="" alt="Nouvelle-Aquitaine" title="Nouvelle-Aquitaine" href="sources/selection.php?region=<?php echo urlencode("Nouvelle-Aquitaine") ?>" coords="115,539,122,536,132,521,144,461,153,458,147,450,143,453,150,404,164,415,167,423,169,423,165,405,149,393,135,355,150,361,156,354,181,354,169,314,199,308,207,303,215,318,232,318,254,354,300,353,307,358,315,379,306,391,314,398,310,415,293,441,264,437,261,454,244,469,242,479,231,501,189,507,185,528,193,526,197,547,181,573,167,575,161,565,131,555,133,547" shape="poly">
                            <area target="" alt="Auvergne-Rhône-Alpes" title="Auvergne-Rhône-Alpes" href="sources/selection.php?region=<?php echo urlencode("Auvergne-Rhône-Alpes") ?>" coords="293,444,311,416,315,398,307,390,315,379,308,358,304,351,336,328,339,336,360,333,365,344,375,347,372,366,390,368,396,359,410,365,418,344,435,348,439,359,458,358,468,348,469,357,463,366,478,358,476,351,496,346,501,368,508,372,507,379,497,382,500,390,508,396,517,407,513,419,486,432,479,426,481,444,454,459,446,471,446,478,454,483,449,491,419,487,406,479,390,484,383,482,375,455,354,448,349,440,333,459,322,444,310,462,296,461" shape="poly">
                            <area target="" alt="Provence-Alpes-Côte d'Azur" title="Provence-Alpes-Côte d'Azur" href="sources/selection.php?region=<?php echo urlencode("Provence-Alpes-Côte d'Azur") ?>" coords="394,534,410,522,418,502,407,483,449,494,457,486,456,480,446,477,447,470,460,458,483,444,482,430,494,430,513,445,514,452,508,468,515,482,533,489,544,486,550,493,540,507,525,519,504,547,493,551,465,557,456,550,444,548,431,541,419,536,419,544,408,541" shape="poly">
                            <area target="" alt="Corse" title="Corse" href="sources/selection.php?region=<?php echo urlencode("Corse") ?>" coords="526,577,528,558,533,559,542,614,535,625,531,661,511,650,514,640,503,639,508,627,500,625,501,616,497,614,497,595,517,576" shape="poly">
                            <area target="" alt="Occitanie" title="Occitanie" href="sources/selection.php?region=<?php echo urlencode("Occitanie") ?>" coords="183,573,199,547,193,523,185,526,189,507,231,502,246,469,263,454,264,439,290,440,294,462,311,464,322,447,332,464,349,444,372,458,383,483,404,480,415,498,408,519,393,534,378,529,361,547,350,547,338,566,338,598,311,605,289,604,276,598,279,590,226,572,225,583,194,582" shape="poly">
                            <area target="" alt="Guadeloupe" title="Guadeloupe" href="sources/selection.php?region=<?php echo urlencode("Guadeloupe") ?>&departement=<?php echo urlencode("Guadeloupe") ?>" coords="708,110,697,116,679,115,664,113,661,99,654,92,646,98,649,113,642,119,631,92,603,63,586,69,565,101,618,112,614,124,625,159,633,173,681,172,689,165,681,155,703,122,713,115" shape="poly">
                            <area target="" alt="Martinique" title="Martinique" href="sources/selection.php?region=<?php echo urlencode("Martinique") ?>&departement=<?php echo urlencode("Martinique") ?>" coords="593,211,590,224,604,246,615,246,615,251,606,255,608,262,583,264,569,274,569,283,608,280,636,268,642,262,636,247,624,230,631,229,631,224,617,225,613,217,604,210" shape="poly">
                            <area target="" alt="Guyane" title="Guyane" href="sources/selection.php?region=<?php echo urlencode("Guyane") ?>&departement=<?php echo urlencode("Guyane") ?>" coords="614,320,629,330,640,331,664,346,668,359,657,378,649,400,638,407,628,402,608,409,600,405,614,373,603,359,600,339" shape="poly">
                            <area target="" alt="La Réunion" title="La Réunion" href="sources/selection.php?region=<?php echo urlencode("La Réunion") ?>&departement=<?php echo urlencode("La Réunion") ?>" coords="617,456,646,462,649,473,665,488,664,509,638,516,608,505,597,476,603,464" shape="poly">
                            <area target="" alt="Mayotte" title="Mayotte" href="sources/selection.php?region=<?php echo urlencode("Mayotte") ?>&departement=<?php echo urlencode("Mayotte") ?>" coords="617,564,603,579,606,589,613,592,619,590,618,618,624,625,629,636,613,628,614,639,619,652,629,654,642,650,635,643,649,622,640,613,651,599,667,611,674,603,675,571,667,558,653,558,644,574,633,583" shape="poly">
                        </map>
                    </div>
    			</div>
    				
    			<?php
                    $meteo = new MeteoManager();
                    $lr = $meteo->getListeRegions();
                
                    $reg = $meteo->getRegion("Île-de-France");
                    $dep = $reg->getDepartement("Val-d'Oise");
                    // print_r($dep->getListeVilles());
                
                    //print_r($meteo->getListeRegions());
                
                 ?>
    				
    				
    			</section>
    	</section>
    
    	<footer>
    		<p>
    			FD Météo<br />
    			Copyright Françoise de Salles TOMEGAH et Daniel FRANCOIS<br />
    			Tous droits réservés | 2020
    		</p>
		
    		<p>
    			Dans le cadre d'un projet en Developpement Web<br />
    			L2 Informatique<br />
    			Cergy-Pontoise Université<br />
    			<img alt="logo-cy" src="images/logo_CY.png">
    		</p>
    		<p>
    			<?php echo '<br />' . afficheDate(); ?>
    			<?php echo '<br />Navigateur : ' . get_navigateur(); ?>
    			<?php echo ' - Visites : ' . get_visites(); ?>
    		</p>
    	</footer>
    
        
    </body>
</html>