<?php
include("models/gantt.php");

class ControllerGantt
{
	private $modelGantt;
        private $idSprint;
        private $daysNb;

	public function __construct()
	{
		$this->modelGantt = new ModelGantt();
                $this->idSprint = -1;
                $this->daysNb = -1;
	}
        
        public function _setSprint($idSprint){
            $this->idSprint = $idSprint;
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
        
        public function _initGanttModel($dev,$day){
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
            //$this->_initGanttModel(1, 1);
            echo "<thead><tr>";
            $req = $this->modelGantt->_getDays($this->idSprint);
            $daysNb = $req->fetch();
            $day = 1;
            $this->daysNb = $daysNb['duree'];
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
        
        protected function _buildCell($dev,$day){
            $this->_setupTasc();
        }
        
        protected function _setupTasc(){
            
            /*echo "<select name=tasc>";
            ?><option value=<?php echo $sprint['ID'] ?> selected="selected"> Sprint N° <?php echo $sprint['numero_du_sprint']?></option>;
            <?php
            echo "</select>";*/
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