<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<?php
	// Connexion à la bas ede données des utilisateurs
	include 'connexion.php';
	
	// Récupération de l'identifiant et du mot de passe du formulaire
	$id=$_POST['Identifiant'];
	$mdp=$_POST['MotDePasse'];
	
	// Est-ce que l'identifiant et le mot de passe ont bien été reçus ?
	if (isset($id) && (isset($mdp))){
		// Est que l'identifiant ou le mot de passe est vide ?
		if (($id == null) || ($mdp == null)){
			echo ("L'identifiant ou le mot de passe est vide.");
		} else {
			// Est-ce que cet identifiant existe dans la base de données ?
			$requete = "SELECT * FROM test WHERE ID ='$id'";
			$result = mysqli_query($connexionBDD,$requete);
			$row = mysqli_fetch_assoc($result);
			if($row != null){
				if ($mdp != $row['MDP']){
					echo("Ce mot de passe est incorrect.");
				} else {
					switch ($row['DROITS']){
						case 'admin' : echo "Bienvenue administrateur ".$id; 
						break;
						case 'user' : echo "Bienvenue utilisateur ".$id; 
						break;
						case 'invited' : echo "Bienvenue invité ".$id; 
						break;
						default : echo "Pas de droits enregistrés pour ".$id; 
						break;
					}
				}
			} else { echo("Cet identifiant n'est pas enregistré.");	}
		}
	} else { echo ("Les paramètres n'ont pas été reçus.");	}
	?>
	</body>
</html>
