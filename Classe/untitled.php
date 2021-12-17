
<?php 
	$i = 0;
//EXERCICE 8
	echo "<u>EXERCICE 8</u><br/>";
	do
	{
		$a = rand(1,100);
		$b = rand(1,100);
		$c = rand(1,100);
		$i++;
	}
	while(($a % 2 != 0) or ($b % 2 == 0) or ($c % 2 == 0));
	echo "a = ".$a."; b = ".$b."; c = ".$c."<br/>";
	echo "Nombre de coups réalisés : ".$i."<br/>";

// EXERCICE 9
	echo "<u>EXERCICE 9 (avec do...while)</u><br/>"; 
	$nbre = 143;
	$i = 0;
	do
	{
		$a = rand(100,999);
		$i++;
	}
	while($a != $nbre);
	echo "Nombre de coups réalisés : ".$i."<br/>";

	echo "<u>EXERCICE 9 (avec while)</u><br/>";
	$i = 0;
	while(rand(100,999) != $nbre)
	{
		$i++;
	}
	echo "Nombre de coups réalisés : ".$i."<br/>";

// EXERCICE 10
	echo "<u>EXERCICE 10</u><br/>";
	/*$alphabet = array(
		11 => 'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
	);*/

	for ($i=11; $i <= 36; $i++) { 
		$alphabet[$i] = chr($i + 54);
	}
	for ($i=11; $i < count($alphabet)+11 ; $i++) 
	{ 
		echo $i." => ".$alphabet[$i]."<br/>";
	}
	echo "Avec foreach<br/>";
	foreach ($alphabet as $key => $value) {
		echo $key." =>".$value."<br/>";
	}

// EXERCICE 11
	echo "<u>EXERCICE 11</u><br/>";
	$i = 8;
	do
	{
		$tirage = rand(1,50);
	}
	while($tirage % $i != 0);
	echo $tirage;
 ?>
 <!-- 

 -->


 <?php 
	/*echo phpos
	echo phpversion();
	echo phpinfo();
$_server_['http_accept_language'];*/

	/*class Test
	{

		function afficher()
		{
			echo "hello <br/>";
		}
	}

	$object = new Test();
	$object->afficher();

	define(PI, 3.141597);
	echo PI;
	echo "<br/>";

	$var = 5;
	if (is_integer($var)) {
		echo "C'est un entier <br/>";
	}

	echo gettype(PI);
	echo "<br/>";
  	
		for($i=1,$j=9;$i<10,$j>0;$i++,$j--)
		{
			echo "<span style=\"border-style:double;border-width:3;\"> $i + $j=10</span>";
		}
	echo "<br/>";
	/*$x = 'php5';
	$a[] = &$x;
	print_r($a);
	$y = ' 5 eme V';
	$y *= 10;
	echo $y;
	$a[0] = $y;
	print_r($a);

		echo "<br/>";

?>

<?php 
	$tab = array(
		1 => 'Luc hasard',
		2 => 'ABALO',
		3 => 'Jean Escargot',
		4 => 'Sa capteuse',
		5 => 'Koffi',
		6 => 'Kodjo',
		7 => 'Ghust',
		8 => 'H-Ley' 
	);
?>
<table border="1">
	<tr>
		<td>ID</td>
		<td>NOM</td>
	</tr>
	<?php foreach ($tab as $key => $value) { ?>
	<tr>
		<td><?php echo $key; ?></td>
		<td><?php echo $value; ?></td>
	</tr>
	<?php } ?>
</table>

<script type="text/javascript">
	alert('Votre catégorie : ' + (confirm('Êtes-vous majeur ?') ? '18+'
: '-18'));
</script> -->
/*function carre($i){
		return $i*$i;
	}

	$a = 4;
	$b = 2;
	//echo carre($a);

	function calculComplexe($i, $j){
		$reponse['modulo'] = sqrt(($i*$i)+($j*$j));
		$reponse['argument'] = atan2($i, $j);
		return $reponse;
	}

	echo "Calcul de l'argument et modulo de: ",$a,"+",$b,"i<br/>";
	print_r(calculComplexe($a,$b));
	echo "<br/>";

	$table = array(2,5,8,9,7);
	function produit($j){
		$reponse['nbr'] = count($j);
		$reponse['resultat'] = 1;
		for ($i=0; $i < $reponse['nbr'] ; $i++) { 
			$reponse['resultat'] *= $j[$i]; 
		}

		return $reponse;
	}

	print_r(produit($table));
	echo "<br/>";*/
 ?>