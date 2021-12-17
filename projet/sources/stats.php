<?php // content="text/plain; charset=utf-8"
require_once ('../include/src/jpgraph.php');
require_once ('../include/src/jpgraph_bar.php');

 

$datay=array(fgets(fopen("Auvergne.txt", "r")),fgets(fopen("Bourgogne.txt", "r+")),fgets(fopen("Bretagne.txt", "r+")),fgets(fopen("Centre-Val de Loire.txt", "r+")),fgets(fopen("Corse.txt", "r+")),fgets(fopen("Grand Est.txt", "r+")),fgets(fopen("Guadeloupe.txt", "r+")),fgets(fopen("Guyane.txt", "r+")));



// Create the graph. These two calls are always required
$graph = new Graph(1200,600,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,10,20,30,40,50,60,70,80,90,100), array(5,15,25,35,45,55,65,75,85,95));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array("Auvergne-Rhône-Alpes","Bourgogne-Franche-Comté","Bretagne","Centre-Val de Loire","Corse","Grand Est","Guadeloupe","Guyane"));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Nombres de Visites par région Partie 1");

// Display the graph
$graph->Stroke();

?>	