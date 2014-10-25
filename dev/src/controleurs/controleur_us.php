<?php
class Controleur
{
	private $modele;

	public function __construct()
	{
		$this->modele = new Modele();
	}
	
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
			<td><?php echo $ligne['sprint']; ?></td>
			<td><?php echo $ligne['dependances']; ?></td>
			<td><?php echo $ligne['cout']; ?></td>
			<td><?php echo $ligne['date_debut']; ?></td>
			<td><?php echo $ligne['date_fin']; ?></td>
			<td><?php echo $ligne['statut']; ?></td>
			<td><?php echo $ligne['date_test']; ?></td>
			<td>
				<a href="modifier_us.php?us=<?php echo $ligne['ID']; ?>">M</a>
				<a href="supprimer_us.php?us=<?php echo $ligne['ID']; ?>">S</a>
				<a href="#">D</a>
				<a href="lancer_test.php?test=<?php echo $ligne['ID_test']; ?>">L</a>
			</td>
		</tr>
		<?php
	}		
}

$controleur = new Controleur(); 