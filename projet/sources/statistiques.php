<?php
    session_start();
    
    function chargerClasse($classe)
    {
        require '../classes/' . $classe . '.php';
    }
    spl_autoload_register("chargerClasse");

?> 

<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Projet météo page des statistiques" />
		<meta name="author" content="Francoise-de-Salles Tomegah/ Daniel François" />
		<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon"/>
		<link rel="stylesheet" href="../styles/style1.css" />
		
		<title>Météo : Statistiques</title>
		
		
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
	
		<h2>Page de statistiques</h2>
		
		<?php include("../include/util.inc.php"); ?> 
		    	
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

				<div>
				<?php
				$handle= fopen("stat.csv", "r");
                if ($handle !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        for ($c=0; $c < $num; $c++) {
                            
                            //echo $data[$c] ." ". get_stat ($data[$c])."<br />\n";
                            
                            $var=get_stat ($data[$c]);
                            $s[$data[$c]]=$var;
                            
                            
                            
                        }
                        
                    }
                            //print_r(array_values($s));
                         // print_r(array_keys($s));
                          
                }
                			
                fclose($handle);

 
                ?>

				</div>
				<div class="graph">
				    <?php 
				        echo '<img class="box" style="" src="graphe.php"/>'; 
				     
				        echo '<img class="box" style="width: 70%;" src ="stats.php"/>'; 
				        
				        echo '<img class="box" style="width: 70%;" src ="stats2.php"/>'; 
				    ?>
				</div>
				
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