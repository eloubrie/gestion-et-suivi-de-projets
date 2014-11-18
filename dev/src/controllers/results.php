<?php
include("models/empty.php");
include('phplot/phplot.php');

class ControllerResults
{
	private $model;

	public function __construct()
	{
		$this->model = new Model();
        }
        
        protected function _exampleDraw(){
            //Prepare DATA
            $array1 = new ArrayObject();
            $array1->append(20);
            $array1->append(15);
            $array1->append(12);
            $array1->append(10);
            $array1->append(5);
            $array1->append(1);

            $array2 = new ArrayObject();
            $array2->append(20);
            $array2->append(18);
            $array2->append(14);
            $array2->append(12);
            $array2->append(6);
            $array2->append(0);

            $arraySprint = new ArrayObject();
            $arraySprint->append(0);
            $arraySprint->append(1);
            $arraySprint->append(2);
            $arraySprint->append(3);
            $arraySprint->append(4);
            $arraySprint->append(5);
            
            $this->_buildBDCAll($arraySprint, $array1, $array2);
        }
        
        //TODO David
        public function _drawBDC(){
            //$this->_buildBDCAll($arraySprint, $array1, $array2);
            $this->_exampleDraw();
        }
        
        //TODO David
        public function _drawASprintBDC($sprintID){
            //$this->_buildBDCSprint($sprintName, $arrayExpected, $arrayRealize)
        }
        
        protected function _buildBDCSprint($sprintName, $arrayDays, $arrayExpected, $arrayRealize){
            $BDC_all = new PHPlot(800,600);              
            $BDC_all->SetTitle("Burn Down Chart : ".$sprintName);
            $BDC_all->SetXTitle('Durée');
            $BDC_all->SetYTitle('Points restants');
            $this->_drawShape($BDC_all, $arrayDays, $arrayExpected, $arrayRealize);
            
        }       
        
        protected function _buildBDCAll($arraySprint, $arrayExpected, $arrayRealize){
            $BDC_all = new PHPlot(800,600);              
            $BDC_all->SetTitle("Burn Down Chart");
            $BDC_all->SetXTitle('Sprints');
            $BDC_all->SetYTitle('Points restants');
            $this->_drawShape($BDC_all, $arraySprint, $arrayExpected, $arrayRealize);
        }

        protected function _drawShape($plot, $xData, $yData1, $yData2){
            $arrayPlot = new ArrayObject();
            for($i=0;$i<$xData->count();$i+=1)
            {
                $arrayPlot->append(array($xData[$i], $yData1[$i], $yData2[$i]));
            }
            $plot->SetDataColors(array('orange', 'green'));
            $plot->SetLegend(array('Theorique', 'Valide'));
            $plot->SetDataValues($arrayPlot);
            $plot->DrawGraph();
        }
	
	/*
	Implémenter ici les méthodes permettant de générer des morceaux de code html.
	L'attribut "modele" permet d'accéder aux données de la BDD grâce à des appels comme : $this->modele->getAllUS()
	Pour que cet appel fonctionne, il faut bien sûr implémenter getAllUS dans le modèle.
	
	Exemple :
	public function build_table()
	{
		foreach($this->modele->get_US() as $ligneUS)
		{
			$this->build_line($ligneUS);
		}
	}
	
	private function build_line($ligne)
	{
		?>
		<tr>
			<td><?php echo $ligne['ID']; ?></td>
			<td><?php echo $ligne['description']; ?></td>
			<td><?php echo $ligne['cout']; ?></td>
			<td><?php echo $ligne['dependances']; ?></td>
		</tr>
		<?php
	}	
	*/
}