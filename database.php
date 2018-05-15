<?php 
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=esdquizz;charset=utf8', 'root', ''); 
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$link = mysqli_connect("localhost", "root", "", "esdquizz");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$nom = mysqli_real_escape_string($link, $_REQUEST['nom']);
$prenom = mysqli_real_escape_string($link, $_REQUEST['prenom']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);

$sql = "INSERT INTO questionsreponses (nom, prenom, age) VALUES ('$nom', '$prenom', '$age')";

if (mysqli_query($link, $sql))  {
    echo "Oui bravo !";
} else{
    echo "Nope c'est cassé..." . mysqli_error($link);
}
?>
<br / >
<?php
$reponse =  $bdd->query('SELECT * FROM questionsreponses ORDER BY RAND() LIMIT 1');
	while ($donnees = $reponse->fetch()) {
    	echo $donnees['nom'];
    	echo $donnees ['prenom'];
		echo $donnees ['age'];
	}
mysqli_close($link);
?>