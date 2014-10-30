<?php
include("modeles/modele_git.php");

class ControleurGit
{
	private $modele;

	public function __construct()
	{
            $this->modele = new ModeleGit();
	}
        
        public function _printGitLink(){
            $req = $this->modele->_getGitURL();
            $data = $req->fetch();
            return $data['lien'];
        } 
        
        public function _modifyGitLink($url){
            $this->modele->_setGitURL($url);
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

$controleur = new ControleurGit(); 