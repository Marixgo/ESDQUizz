<?php>
	$val = $POST('maval'); 
	echo maval; 
	$_SESSION['pseudo'] = $val; 

	$servername = "localhost"; 
	$username = "root"
	$dbname ="questionsreponses"; 

	$conn = new mysqli($servername, $username, $password, $dbname); 

	$sql = "INSERT INTO table (firstname, lastname, email)
	VALUES (?, ?, ?)"; 

	$conn->querry($sql); 
	$conn->close(); 
?>
<!doctype html>

<html lang="en">
<head>
	<title>Quizz ESD </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>ESD Quizz</h1>
</header>
	<form action="database.php" method="post">
		<p>Nom du joueur</p>
		<input class="class" name="nom" id="value1" type="text" value="Nom du joueur" />
		<br />
		<input id="submit" type="submit" name="valider" value="Jouer ! "/>
		<input type="hidden" value="hidden_field" name="hidden_field"/>
	</form>
</body>
</html>

///afficher pseudo et scror en haut à gauche 
////stylisé le tout 
///ajouter le pseudo dans la variable de session et dans la bdd 
