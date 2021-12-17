<?php
    session_start();
    function chargerClasse($classe)
    {
        require '../classes/' . $classe . '.php';
    }
    spl_autoload_register("chargerClasse");
    
    function skip_accents($str, $charset='utf-8' ) {
        
        $str = htmlentities($str, ENT_NOQUOTES, $charset );
        
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str );
        $str = preg_replace('#&[^;]+;#', '', $str );
        
        return $str;
    }
    
    if(isset($_POST["choixVille"]))
    {
        $nomRegion = $_POST["choixRegion"];
        $nomDept = $_POST["choixDepartement"];
        $nomVille = $_POST["choixVille"];
        $format = (int)$_POST["format"];
        
        
        $meteo = new MeteoManager();
        
        $region = $meteo->getRegion($nomRegion);
        $dept = $region->getDepartement($nomDept);
        $ville = $dept->getVille($nomVille);
        $insee = $ville->getInsee();
        $coordonnees = skip_accents($nomVille) . ',' . skip_accents($nomRegion);
        
        setcookie('derniereVille', $coordonnees, time() + 365*24*3600, '/', null, false, true);
    }
    
    include ("../include/util.inc.php");
?> 

<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Projet météo page de sélection" />
		<meta name="author" content="Francoise-de-Salles Tomegah/ Daniel François" />
		<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon"/>
		<link rel="stylesheet" href="../styles/style1.css" />
		
		<title>Météo : Page de prévisions</title>
		
		
	</head>
	
	<body>
		<header>
			<a href="../index.php"><img src="../images/logo.png" alt="Logo"/></a>
			<div id="entete">
				<h1> 
					FD Météo<br />
					Prévisions météorologiques
				</h1>
			
				<nav id="menu">
					<ul>
						<li><a href="../index.php">ACCUEIL</a></li>
						<li><a href="./statistiques.php">STATISTIQUES</a></li>
					</ul>
				</nav>
			</div>
		</header>
	
		<h2 style="color: white">Prévisions météo pour <?php echo "$nomVille, $nomDept" ?></h2>
		
		    	
		<section id="contenu" style="color: white">
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
    				    $GVmanager = unserialize($_SESSION['GVM']);
    				    
    				    if($dernVille != "")
    				        $GVmanager->afficherDernVille();
    				    
    				    $GVmanager->afficherPrevGV();
    				    
    				    
    				?>
    			</div>
			</nav>
			
			<section id="corps">					
                <?php 
                    $meteo = new PrevisionsManager($coordonnees, $format);
                ?>
                
                <form method="post" action="resultat.php">
                	Affichage de la météo :
                	<input type="radio" name="format" value="0" id="defaut" checked="checked" /> <label for="defaut">Tendance générale</label>
                	<input type="radio" name="format" value="1" id="h24" /> <label for="h24">Par heure (24h)</label>
                	<input type="radio" name="format" value="2" id="h48" /> <label for="h48">Par heure (48h)</label>
                	<input type="hidden" name="choixRegion" value="<?php echo $nomRegion; ?>" />
            		<input type="hidden" name="choixDepartement" value="<?php echo $nomDept; ?>" />
            		<input type="hidden" name="choixVille" value="<?php echo $nomVille; ?>" />
                	<input type="submit" />
                </form>
                
                <section id="meteoActuelle">
                    <h4>Actuellement</h4>
                    <?php    
                        $meteo->afficherEtatActuel();
                    ?>
                </section>
                
                <section id="meteoActuelle">
                    <h4>Informations complémentaires</h4>
                    
                    <div style="display: flex; justify-content: space-between;">
                        <?php    
                            $meteo->afficherInfoSup();
                        ?>
                    </div>
                </section>
                
                <section id="meteoHoraire">

                    <?php 
                    if($format == 1)
                    {
                        echo '<h4>Prévisions horaires</h4>';
                        $meteo->afficherPrevisionsHoraire();
                    }
                    else if($format == 2)
                    {
                        echo '<h4>Prévisions horaires</h4>';
                        $meteo->afficherPrevisionsHoraire48h();
                    }
                    ?>
                </section>			
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
    			<img alt="logo-cy" src="../images/logo_CY.png">
    		</p>
    		<p>
    			<?php echo '<br />' . afficheDate(); ?>
    			<?php echo '<br />Navigateur : ' . get_navigateur(); ?>
    			<?php echo ' - Visites : ' . get_visites(); ?>
    		</p>		
		</footer>
		
		
		
	</body>
</html>