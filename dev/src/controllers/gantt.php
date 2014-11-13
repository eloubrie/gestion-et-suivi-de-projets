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
        
        protected function _findSprintDays(){
            $req = $this->modelGantt->_getDays($this->idSprint);
            $daysNb = $req->fetch();
            $this->daysNb = $daysNb['duree'];
        }
        
        public function _getSprint(){
            return $this->idSprint;
        }
        
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
        
        protected function _buildCell($dev_name, $cDay){
            echo "<td>";
            $this->_setupTasc($dev_name, $cDay);
            echo "</td>";
        }
        
        protected function _setupTasc($dev_name, $cDay){
            $selectID = $this->selectTag."_".$dev_name."_".$cDay;
            $tascs = $this->modelGantt->_getAllTascs();
            ?><select name="<?php echo $selectID?>"> 
            <?php
            foreach($tascs as $tasc){
                $tascArray = $this->modelGantt->_getTasc($dev_name,$cDay,$this->idSprint);
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