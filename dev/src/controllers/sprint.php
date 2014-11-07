<?php
include("models/sprint.php");

class ControllerSprint
{
	private $modelSprint;

	public function __construct()
	{
		$this->modelSprint = new ModelSprint();
	}
	
	public function _getSprintList()
	{
		return $this->modelSprint->_getSprintList();
	}
        
        public function _buildSprintList()
	{
		foreach($this->modelSprint->_getSprintList() as $sprint)
		{
			$this->_buildSprintListLine($sprint);
		}
	}
        
        private function _buildSprintListLine($line)
	{
		?>
		<tr>
			<td><?php echo $line['numero_du_sprint']; ?></td>
			<td><a href="sprint.php?ID=<?php echo $line['ID']; ?>"><?php echo $line['titre']; ?></a></td>
			<td><?php echo $line['cout']; ?></td>
			<td><?php echo $line['duree']; ?></td>
			<td><?php echo $line['date_creation']; ?></td>
			<td><?php echo $line['date_debut']; ?></td>
			<td><?php echo $line['date_fin']; ?></td>
			<td><?php echo $line['cout_valide']; ?></td>
			<td>
				<a href="#" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
				<a href="#" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
		</tr>
		<?php
	}
}