<?php 
include("bdd/bdd.php");
include("structure/top_page.php");
?>

<h3>Gérer son projet avec des outils adaptés</h3><br />

<p>Ce site a pour but de fournir des outils permettant de gérer votre projet et le mener à terme. Il vous permettra entre autre de :</p>

<p>
- Créer/Gérer une liste d'users story.<br />
- Associer des tâches à des users story.<br />
- Visualiser les tâches à faire, en cours ou terminées.<br />
- Générer un Gantt correspondant à un sprint.<br />
- Accéder aux sources du projet pour une user story donnée.<br />
- Générer un bilan d'un sprint terminé.<br />
</p>

<p>Ces différents outils vous permettront de structurer beaucoup plus facilement le déroulement de votre projet.</p>
<br />

<?php 
include("bdd/BDDTestManager.php"); 
include("structure/bottom_page.php"); 
?>					
						