<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<?php
	// Connexion à la bas ede données des utilisateurs
	include 'connexion-PDO.php';
	
	// Récupération de l'identifiant et du mot de passe du formulaire
	$identifiant=$_POST['Identifiant'];
	$motDePasse=$_POST['MotDePasse'];
	
	// Est-ce que l'identifiant et le mot de passe ont bien été reçus ?
	if (isset($identifiant) && (isset($motDePasse))){
		// Est que l'identifiant ou le mot de passe est vide ?
		if (($identifiant == null) || ($motDePasse == null)){
			echo ("L'identifiant ou le mot de passe est vide.");
		} else {
			// Est-ce que cet identifiant existe dans la base de données ?
			$requete = $bdd -> prepare('SELECT * FROM test WHERE ID = :identifiant');
			$requete -> execute(array('identifiant' => $identifiant));
			$result = $requete->fetch(PDO::FETCH_ASSOC);
			/* print_r($result);
			echo "<br>"; */
			if($result != null){
				if ($motDePasse != $result['MDP']){
					echo("Ce mot de passe est incorrect.");
				} else {
					switch ($result['DROITS']){
						case 'admin' : echo "Bienvenue administrateur ".$identifiant; 
						break;
						case 'enseignant' : echo "Bienvenue enseignant ".$identifiant; 
						break;
						case 'etudiant' : echo "Bienvenue étudiant ".$identifiant; 
						break;
						default : echo "Bienvenue visiteur ".$identifiant; 
						break;
					}
				}
			} else { echo("Cet identifiant n'est pas enregistré.");	}
		}
	} else { echo ("Les paramètres n'ont pas été reçus.");	}
	?>
	</body>
</html>
