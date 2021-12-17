<?php // content="text/plain; charset=utf-8"
require_once ('../include/src/jpgraph.php');
require_once ('../include/src/jpgraph_bar.php');

 

$datay=array(fgets(fopen("Visites.txt","r")));



// Create the graph. These two calls are always required
$graph = new Graph(350,220,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,500,1000,1500,2000), array(250,750,1250,1750));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('Visites'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Nombre total de visites du site");

// Display the graph
$graph->Stroke();

?>	