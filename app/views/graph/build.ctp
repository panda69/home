<?php 
App::import('Vendor', 'jpgraph/jpgraph');
App::import('Vendor', 'jpgraph/jpgraph_line');
App::import('Vendor', 'jpgraph/jpgraph_date');
App::import('Vendor', 'jpgraph/jpgraph_utils.inc');
 
// Some (random) data
//$ydata = array(11,3,8,12,5,1,9,13,5,7);
 
// Size of the overall graph
$width=900;
$height=250;
 
// Create the graph and set a scale.
// These two calls are always required
$graph = new Graph($width, $height);
$graph->SetScale('textint');
//$graph->xaxis->SetLabelFormatString('d-M-Y', true);
 
// Create the linear plot
$lineplot=new LinePlot($ydata, $xdata);
 
// Add the plot to the graph
$graph->Add($lineplot);
 
// Display the graph
$graph->Stroke();

?> 