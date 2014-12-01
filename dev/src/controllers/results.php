<?php
include("models/sprint.php");
include("models/us.php");
include('phplot/phplot.php');

class ControllerResults
{
	private $modelSprint;
	private $modelUs;

	public function __construct()
	{
		$this->modelSprint = new ModelSprint();
		$this->modelUs = new ModelUS();
    }
	
	// Draw BDC for entire project
	public function _drawGlobalBDC()
	{
		$values = $this->_getValuesGlobalBDC();
		$this->_buildBDCAll($values[0], $values[1], $values[2]);
	}
	
	// Draw BDC for a sprint
	public function _drawASprintBDC($sprintID)
	{
		$values = $this->_getValuesSprintBDC($sprintID);
		$this->_buildBDCSprint("Sprint ".$sprintID, $values[0], $values[1], $values[2]);
	}
	
	// Draw BDC for a sprint from arrays
	protected function _buildBDCSprint($sprintName, $arrayDays, $arrayExpected, $arrayRealize){
		$BDC_all = new PHPlot(950,500);              
		$BDC_all->SetTitle("Burn Down Chart");
		$BDC_all->SetXTitle('Jours');
		$BDC_all->SetYTitle('Points restants');
		$this->_drawShape($BDC_all, $arrayDays, $arrayExpected, $arrayRealize);
		
	}  
	
	// Draw BDC for entire project from arrays
	protected function _buildBDCAll($arraySprint, $arrayExpected, $arrayRealize){
		$BDC_all = new PHPlot(800,600);              
		$BDC_all->SetTitle("Burn Down Chart");
		$BDC_all->SetXTitle('Sprints');
		$BDC_all->SetYTitle('Points restants');
		$this->_drawShape($BDC_all, $arraySprint, $arrayExpected, $arrayRealize);
	}

	// Draw BDC lines
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
	
	// Calculate values to draw in sprint BDC
	protected function _getValuesSprintBDC($id_sprint)
	{
		$sprint = $this->modelSprint->_getSprint($id_sprint)->fetch(PDO::FETCH_ASSOC);
		
		$cout_sprint = 0;
		foreach($this->modelUs->_getUsFromSprint($id_sprint) as $us)
		{ $cout_sprint += $us['cout']; }
		
		$globalArray = new ArrayObject();
		$abcissArray = new ArrayObject();
		$theoricArray = new ArrayObject();
		$realArray = new ArrayObject();
		
		for($jour=0;$jour<=$sprint['duree'];$jour++)
		{
			$abcissArray->append($jour);
			$theoricArray->append(($sprint['duree']-$jour) * ($cout_sprint/$sprint['duree']));
			$realArray->append(($cout_sprint-$sprint['cout_valide']) + ($sprint['duree']-$jour) * ($sprint['cout_valide']/$sprint['duree']));
		}
		
		$globalArray->append($abcissArray);
		$globalArray->append($theoricArray);
		$globalArray->append($realArray);
		
		return $globalArray;
	}
	
	// Calculate values to draw in entire project BDC
	protected function _getValuesGlobalBDC()
	{
		$globalArray = new ArrayObject();
		$abcissArray = new ArrayObject();
		$theoricArray = new ArrayObject();
		$realArray = new ArrayObject();
	
		$cout_total = 0;
		foreach($this->modelUs->_getBacklog() as $us)
		{ $cout_total += $us['cout']; }
		
		$cout_theoric_total = $cout_total;
		$cout_reel_total = $cout_total;
		
		$abcissArray->append(0);
		$theoricArray->append($cout_theoric_total);
		$realArray->append($cout_reel_total);
		
		foreach($this->modelSprint->_getSprintList() as $sprint)
		{
			$cout_sprint = 0;
			foreach($this->modelUs->_getUsFromSprint($sprint['ID']) as $us)
			{ $cout_sprint += $us['cout']; }
			
			$cout_theoric_total -= $cout_sprint;
			$cout_reel_total -= $sprint['cout_valide'];
		
			$abcissArray->append($sprint['numero_du_sprint']);
			$theoricArray->append($cout_theoric_total);
			$realArray->append($cout_reel_total);
		}
	
		$globalArray->append($abcissArray);
		$globalArray->append($theoricArray);
		$globalArray->append($realArray);
		
		return $globalArray;
	}
}