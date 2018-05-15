<?php 
session_start(); 

////require database et define .... 
if(isset($_POST["pseudojoueur"]) == 1){
	$user = $_POST["pseudojoueur"];
	$user = htmlspecialchars($user); 
	$_SESSION["pseudojoueur"] = $user; 

	///connexionBDD 
	try{
	   $bdd = new PDO('mysql:host=localhost;dbname=esdquizz;charset=utf8', 'root', ''); 
	}
	catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
	}
	
	$link = mysqli_connect("localhost", "root", "", "esdquizz");

	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	///$pseudojoueur = mysqli_real_escape_string($link, $_REQUEST['pseudojoueur']);
	$sql = "INSERT INTO pseudo (pseudojoueur) VALUES ($_SESSION['pseudojoueur'])";

	if (mysqli_query($link, $sql))  {
	} else{
	    echo "Nope c'est cassé..." . mysqli_error($link);
	}

	//rediriger vers la page suivant via le php 
}


?>
<!doctype html>

<html lang="en">
<head>
	<title>Quizz ESD </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
</head>
<body>
<header>
    <h1>ESD Quizz</h1>
</header>
	<form action="indexPseudo.php" method="post">
		<p>Nom du joueur</p>
		<input class="class" name="pseudojoueur" id="value1" type="text"/>
		<br />
		<input id="submit" type="submit" name="valider" value="Jouer !"/>
		<input type="hidden" value="hidden_field" name="hidden_field"/>
	</form>
</body>
</html>