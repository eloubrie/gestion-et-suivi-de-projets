<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title>Conduite de projet</title>
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="structure/design/style.css" />
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<div id="background_bas">
			<div id="background_haut">

				<div id="menu">
					<a href="index.php">Page d'accueil</a>
                    <a href="sprint_list.php">Sprints</a>
					<a href="backlog.php">Backlog</a>
					<a href="tasc_list.php">Tâches</a>
					<a href="gantt.php">Gantt</a>
					<a href="results.php">Bilan</a>
                                        <a href="documentation.php">Documentation</a>
					<a href="git.php">Dépôt git</a>
					<?php
					if (isset($_SESSION['pseudo']))
					{
						echo '<span id="pseudo">'.$_SESSION['pseudo'].'</span>';
						?>
						<a href="deconnection.php">Déconnexion</a>
						<?php
					}
					else
					{
						?>
						<a id="shiftLeft" href="inscription.php">Inscription</a>
						<a href="connection.php">Connexion</a>
						<?php
					}
					?>
				</div>
			
				<div id="banniere">
                    <img id="logoSite" alt="logo du site" src="structure/design/logoSite.png" />
					<h1>Gestion et Suivi de Projet SCRUM</h1>
				</div>
			
				<div id="corps">
					
					<div id="texte">