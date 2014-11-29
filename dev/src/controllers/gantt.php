<?php
include("models/gantt.php");

class ControllerGantt
{
	private $modelGantt;
	private $idSprint;
	private $daysNb;
	private $selectTag;

	public function __construct()
	{
		$this->modelGantt = new ModelGantt();
		$this->idSprint = -1;
		$this->daysNb = -1;
		$this->selectTag = "tasc";
	}
    
	public function _receiveArray($arrayTasc){
		foreach ($arrayTasc as $cle=>$tasc) {
			$parts = explode('_', $cle);
			if($parts[0] === $this->selectTag){
			   $this->modelGantt->_updateTasc($tasc, $parts[1], $parts[2], $this->idSprint);
			   $this->modelGantt->_updateTascState($tasc, $parts[1]);
			}
		}
	}
	
	public function _getSelectTag(){
		return $this->selectTag;
	}
	
	public function _getDays(){
		return $this->daysNb;
	}
	
	public function _setSprint($idSprint){
		$this->idSprint = $idSprint;
		$this->_findSprintDays();
	}
	
	// Calculate number of days of a sprint
	protected function _findSprintDays(){
		$req = $this->modelGantt->_getDays($this->idSprint);
		$daysNb = $req->fetch();
		$this->daysNb = $daysNb['duree'];
	}
	
	public function _getSprint(){
		return $this->idSprint;
	}
	
	// Generate the sprint list
	public function _buildSprintList(){
		echo "<option value=-1>-------</option>";
		foreach($this->modelGantt->_getSprintList() as $sprint){
			if($this->idSprint == $sprint['ID']){?>
				<option value=<?php echo $sprint['ID'] ?> selected="selected"> Sprint N° <?php echo $sprint['numero_du_sprint']?></option>;
			<?php }
			else{
				echo "<option value=".$sprint['ID']."> Sprint N° ".$sprint['numero_du_sprint']."</option>";
			}
		}
	}
	
	// initialize an empty gantt
	public function _initGanttModel(){
		$this->modelGantt->_deleteBySprint($this->idSprint);
		$develops = $this->modelGantt->_getDevelopers();
		$tasc="NULL";
		foreach ($develops as $name){
			$cDay = 1;
			while($cDay <= $this->daysNb){
				$this->modelGantt->_insertGantt($name['ID'], $cDay, $tasc, $this->idSprint);
				$cDay+=1;
			}
		}
	}
	
	// Generate gantt header
	public function _buildHeader(){
		echo "<thead><tr>";
		$day = 1;
		echo '<th></th>';
		while($day<=$this->daysNb){
			echo '<th>J'.$day.'</th>';
			$day+=1;
		}
		echo "</tr></thead>";
	}
	
	// Generate gantt body
	public function _buildTable(){
		echo '<tbody>';
		$dev_name = $this->modelGantt->_getDevelopers();
		foreach ($dev_name as $name){
			echo "<tr>";
			echo "<th scope='row'>".$name['pseudo']."</th>";
			$cDay = 1;
			while($cDay <= $this->daysNb){
				$this->_buildCell($name['ID'], $cDay);
				$cDay+=1;
			}
			echo "</tr>";
		}
		echo '</tbody>';
	}
	
	// Fill gantt cell
	protected function _buildCell($dev_name, $cDay){
		echo "<td>";
		$this->_setupTasc($dev_name, $cDay);
		echo "</td>";
	}
	
	// Generate Tasc List
	protected function _setupTasc($dev_name, $cDay){
		$selectID = $this->selectTag."_".$dev_name."_".$cDay;
		$tascs = $this->modelGantt->_getAllTascs();
		?><select name="<?php echo $selectID?>"> 
		<?php
		echo "<option value=-1>-------</option>";
		foreach($tascs as $tasc){
			$sprintTask = $this->modelGantt->_getSprintIDTasc($tasc['ID'])->fetch(PDO::FETCH_ASSOC);
			if($sprintTask['ID'] !== $this->idSprint)
				continue;
		   // $tascArrayAll = $this->modelGantt->_getTasc($dev_name,$cDay,$this->idSprint);
			$tascArray = $this->modelGantt->_getTasc($dev_name,$cDay,$this->idSprint);
		 /*   $tascArray = array();
			foreach($tascArrayAll as $task){
				$sprintTask = $this->modelGantt->_getSprintIDTasc($task);
				if($sprintTask['ID'] === $this->idSprint){
					echo $sprintTask['ID'];
					array_push($tascArray, $task);
				}
			}*/
			foreach ($tascArray as $tascmp) {
				if($tascmp['ID_tache'] === $tasc['ID']){       
					?><option value="<?php echo $tasc['ID'] ?>" selected="selected"> T<?php echo $tasc['ID']?></option>
				<?php
				}   
				else{
					?><option value="<?php echo $tasc['ID'] ?>"> T<?php echo $tasc['ID']?></option>
				<?php
				}
				break; //TODO : MultiTask
			}
			
			
		}
		?></select>
		<?php
		
	}
}