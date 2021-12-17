<?php
    session_start();
    
    include ("../include/util.inc.php");
    
    function chargerClasse($classe)
    {
        require '../classes/' . $classe . '.php';
    }
    spl_autoload_register("chargerClasse");
    
    if(isset($_GET["region"]))
    {
        $meteo = new MeteoManager();
        $region = $meteo->getRegion($_GET["region"]);
        $nomRegion = $region->getNom();
    }
?> 


<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Projet météo page de sélection" />
		<meta name="author" content="Francoise-de-Salles Tomegah/ Daniel François" />
		<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon"/>
		<link rel="stylesheet" href="../styles/style1.css" />
		
		<title>Météo : Page de séléction</title>
		
		
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
	
		<h2 style="color: white">
			Sélection du département et de la ville<br />
			<?php echo $nomRegion ?>
		</h2>
		
		    	
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
    				    $GVmanager = unserialize($_SESSION['GVM']);
    				    
    				    if($dernVille != "")
    				        $GVmanager->afficherDernVille();
    				    
    				    $GVmanager->afficherPrevGV();
    				    
    				    
    				?>
    			</div>
			</nav>
			
			<section id="corps">	
				
				
				<div style="display: flex;">
    				<div>
    					<img class="box" alt="<?php echo $nomRegion?>" src="../images/regions/<?php echo $nomRegion?>.png" style="width: 500px; height: 500px;">
    				</div>
    				
    				<div class="box" style="margin: auto; padding: 10px;">
    					<p>
    						Faites votre choix dans la liste ci-dessous
    					</p>
    					
        				<?php
        				if(!isset($_GET["departement"]))
        				{
        				?>
        				
            				<form method="get" action="selection.php?region=<?php echo $nomRegion ?>">
            					<input type="hidden" name="region" value="<?php echo $nomRegion ?>" />
            					<label for="departement">Départements</label>
            					<select name="departement">
            					<?php 
                					$listeDep = $region->getListeDepartements();
                					foreach($listeDep as $dept)
                					{
                					    $nomDep = $dept->getNom();
                						echo "<option value=\"$nomDep\">$nomDep</option>";
                					}
            					?>
            					</select>
            					<input type="submit" />
            				</form>
        				<?php 
        				}
        				else
        				{
        				?>
        				
            				<form method="post" action="resultat.php">
            					<label for="choixVille">Villes</label>
            					<select name="choixVille">
            					<?php 
            					   $departement = $region->getDepartement($_GET["departement"]);
            					   foreach($departement->getListeVilles() as $ville)
            					   {
            					       $nomVille = $ville->getNom();
            						   echo "<option value=\"$nomVille\">$nomVille</option>";
            					   }
            					?>
            					</select>
            					<input type="hidden" name="format" value="0" />
            					<input type="hidden" name="choixRegion" value="<?php echo $nomRegion ?>" />
            					<input type="hidden" name="choixDepartement" value="<?php echo $departement->getNom() ?>" />
            					<input type="submit" />
            				</form>
        				<?php 
        				}
        				?>
        			</div>
    
    				
    			</div>
				
				
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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
    			<?php get_stats ($_GET['region']); ?>
    		</p>
		</footer>
		


	</body>
</html>