<link rel="stylesheet" href="styleData.css">
<body>
<?php 
session_start(); 
if(isset($_POST["pseudo"]) == 1){
    $_session["nom"] = $_post['pseudo']
}
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

$pseudojoueur = mysqli_real_escape_string($link, $_REQUEST['pseudojoueur']);



$sql = "INSERT INTO pseudo (pseudojoueur) VALUES ('$pseudojoueur')";

if (mysqli_query($link, $sql))  {
} else{
    echo "Nope c'est cassé..." . mysqli_error($link);
}
?>
<br / >
<div class="choix">
<?php
$reponse =  $bdd->query('SELECT * FROM questionsreponses ORDER BY RAND() LIMIT 1');
	while ($donnees = $reponse->fetch()) {
        ?><div class="question"> 
            <?php echo $donnees['question']; ?></div> 
        <div class="ligne">
        <div class="1"> 
            <?php echo $donnees['choix1']; ?></div>
        <div class="2"> 
            <?php echo $donnees['choix2']; ?></div>
        </div>
        <div class="ligne2">
        <div class="3"> 
            <?php echo $donnees['choix3']; ?></div>
        <div class="4"> 
            <?php echo $donnees['choix4']; ?></div>
        </div>
        <?php 
	}
mysqli_close($link);
?>
</div>
</body>