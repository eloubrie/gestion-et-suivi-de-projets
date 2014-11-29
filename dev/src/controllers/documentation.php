<?php
include("models/documentation.php");
include("models/developer.php");
include("models/git.php");


class ControllerDocumentation
{
    private $modelDocumentation;

	public function __construct()
	{
		$this->modelDocumentation = new ModelDocumentation();
		$this->modelDev = new ModelDeveloper();
		$this->modelGit = new ModelGit();
	}
        
    public function _getDocumentation($id)
	{
		return $this->modelDocumentation->_getDocumentation($id)->fetch(PDO::FETCH_ASSOC);
	}
    
	// Print developers names
	private function _buildDevelopersList($developersList)
	{
		$a = 0;
		foreach ($developersList as $developer) 
		{
			if($a>0)
			{ echo ' - '; }
			echo $developer['pseudo'];
			$a = 1;
		}
	}
    
	// Print the project domumentation
	public function _buildDocumentationInfo($id)
	{
		$documentation = $this->modelDocumentation->_getDocumentation($id)->fetch(PDO::FETCH_ASSOC);
		$devs = $this->modelDev->_getDevelopers();
		$git = $this->modelGit->_getGitURL()->fetch(PDO::FETCH_ASSOC);
		?>
		<h3>Informations générales sur le projet :</h3><br />
		<p><b>Description du projet :</b> <?php echo $documentation['description']; ?></p>
		<p><b>Développeurs participant au projet :</b> <?php $this->_buildDevelopersList($devs); ?></p>
		<br />
		
		<h3>Informations techniques sur le projet :</h3><br />
		<p><b>Dépôt des sources du projet :</b> <a href="<?php echo $git['lien']; ?>"><?php echo $git['lien']; ?></a></p>
		<p><b>Systèmes d'exploitations supportés :</b> <?php echo $documentation['systemes_exploitation']; ?></p>
		<p><b>Navigateurs supportés :</b> <?php echo $documentation['navigateurs']; ?></p>
		<p><b>Langages de programmations utilisés :</b> <?php echo $documentation['langages']; ?></p>
		<p><b>Frameworks utilisés :</b> <?php echo $documentation['frameworks']; ?></p>
		<p><b>Autres outils utilisés :</b> <?php echo $documentation['autres_outils']; ?></p>
		<?php
	}
    
	public function _editDocumentation($description, $operatingSystems, $navigators, $languages, $frameworks, $otherTools)
	{
		$this->modelDocumentation->_editDocumentation($description, $operatingSystems, $navigators, $languages, $frameworks, $otherTools);
	}
}

