<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<?php
		$id=$_POST['Identifiant'];
		$mdp=$_POST['MotDePasse'];
		// Est-ce que l'identifiant et le mot de passe ont bien été reçus ?
		if (isset($id) && (isset($mdp))){
			// Est que l'identifiant ou le mot de passe est vide ?
			if (($id == null) || ($mdp == null)){
				echo ("L'identifiant ou le mot de passe est vide.");
			} else {
				// Est-ce que cet identifiant existe dans la base de données ?
				if ($id != "toto"){
					echo("Cet identifiant n'est pas enregistré.");
				} else {
					// Si l'identifiant existe, est-ce que le mot de passe correspond ?
					if ($mdp !="tata"){
						echo("Ce mot de passe est incorrect.");
					} else {
						echo("Bienvenue ".$id);
					}
				}
			}
		} else {
			echo ("Les paramètres n'ont pas été reçus.");
		}
	?>
	</body>
</html>
