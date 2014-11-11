<?php
include("models/gantt.php");

class ControllerGantt
{
	private $modelGantt;
        private $idSprint;

	public function __construct()
	{
		$this->modelGantt = new ModelGantt();
                $this->idSprint = 0;
	}
        
        public function _setSprint($idSprint){
            $this->idSprint = $idSprint;
        }
        
        public function _buildSprintList($sprintID){
            echo "<option value=-1>-------</option>";
            foreach($this->modelGantt->_getSprintList() as $sprint){
                if($sprintID == $sprint['ID']){?>
                    <option value=<?php echo $sprint['ID'] ?> selected="selected"> Sprint N° <?php echo $sprint['numero_du_sprint']?></option>;
                <?php }
                else{
                    echo "<option value=".$sprint['ID']."> Sprint N° ".$sprint['numero_du_sprint']."</option>";
                }
            }
        }
        
        public function _buildHeader(){
            echo "<tr>";
            $daysNb = $this->modelGantt->_getDays($this->idSprint);
            echo 'DaysNb = '.$daysNb;
            $day = 1;
            while($day <= $daysNb){
                echo '<th>J'.$day.'</th>';
            }
            echo "</tr>";
        }
        
        public function _buildTable(){
            echo "<th scope='row'>Error</th>";
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