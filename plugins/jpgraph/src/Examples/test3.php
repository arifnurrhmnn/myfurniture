<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

//$i = 0;
//while ($i < 10) {
for ($i = 0; $i < 10; $i++) {
  $graph = new Graph(1000, 800);
  $graph->SetScale('textlin');
  $lineplot = new LinePlot(array(50, 60, 100));
  $graph->Add($lineplot);
  $graph->Stroke('/vagrant/samples/test' . $i . '.png');
  error_log("Usage:" . memory_get_usage() / (1024 * 1024) . "MB");
}
?>
