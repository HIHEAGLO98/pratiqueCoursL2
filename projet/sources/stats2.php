<?php // content="text/plain; charset=utf-8"
require_once ('../include/src/jpgraph.php');
require_once ('../include/src/jpgraph_bar.php');

 

$datay=array(fgets(fopen("Hauts-de-France.txt", "r+")),fgets(fopen("ile.txt", "r+")),fgets(fopen("reunion.txt", "r+")),fgets(fopen("Martinique.txt", "r+")),fgets(fopen("Mayotte.txt", "r+")),fgets(fopen("Normandie.txt", "r+")),fgets(fopen("Nouvelle-Aquitaine.txt", "r+")),fgets(fopen("Occitanie.txt", "r+")),fgets(fopen("Pays de la Loire.txt", "r+")),fgets(fopen("Provence.txt", "r+")));



// Create the graph. These two calls are always required
$graph = new Graph(1300,600,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70,80,90,100), array(5,15,25,35,45,55,65,75,85,95));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array("Hauts-de-France","Île-de-France","La Réunion","Martinique","Mayotte","Normandie","Nouvelle-Aquitaine","Occitanie","Pays de la Loire","PACA"));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Nombre de visites par région partie 2");

// Display the graph
$graph->Stroke();

?>	