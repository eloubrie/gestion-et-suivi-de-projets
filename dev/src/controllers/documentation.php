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
        
        private function _buildDevelopersList($developersList)
        {
                foreach ($developersList as $developer) {
                        echo $developer['pseudo'].' - ';
                }
        }
    
        public function _buildDocumentationInfo($id)
	{
		$documentation = $this->modelDocumentation->_getDocumentation($id)->fetch(PDO::FETCH_ASSOC);
                $devs = $this->modelDev->_getDevelopers();
                $git = $this->modelGit->_getGitURL()->fetch(PDO::FETCH_ASSOC);
		?>
                <h3 style="text-decoration: underline;">Informations basiques sur le projet :</h3><br />
		<p><b>Description du projet :</b> <?php echo $documentation['description']; ?></p>
                <p><b>Développeurs participant au projet :</b> <?php $this->_buildDevelopersList($devs); ?></p>
		<br />
                
                <h3 style="text-decoration: underline;">Informations techniques sur le projet :</h3><br />
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

