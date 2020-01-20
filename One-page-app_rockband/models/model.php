<?php
//récupération de la donnée transmise en GET par la requete AJAX: attribut "name" du lien cliqué
$band = $_GET['band'];

//Connection à la DB et affichage des erreurs
$db = new PDO('mysql:host=localhost; dbname=brit\'rock','root','',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $db -> prepare("SELECT * FROM rockbands WHERE id = ?"); //préparation de la commande SQL
$result = $statement -> execute(array($band)); //execution SQL avec le paramètre. Execute retourne un BOOL

//Text si la requete est réussi ($result == true)
if ($result){ //Si réussi
    $resultArray = array(); //tableau vide
    $tmpArray = array(); //tableau vide, donnée temporaire

    while($row = $statement->fetch(PDO::FETCH_ASSOC)){ 
    //Tant qu'il y reste un jeu de donnée, recuperer ce jeu (fetch) en tant que tableau indéxé par le nom de la colonne
        $tmpArray = $row; //stock le jeu de donnée
        array_push($resultArray, $tmpArray); //Ajouter à la fin du tableau resultArray (initialement vide), le tableau tmpArray
    }
    print_r(json_encode($resultArray)); //converti un tableau de donné format MySQL en format JSON
}else {
    die("Error.<br>");
}



/***************************************************************************************/
/* Première solution. Ne convient pour pour un usage "standardisé"					   */
/* car besoin d'ajouter une condition pour chaque nous "lien"                          */
/***************************************************************************************/


/*
//Connection à la DB
$db = mysqli_connect('localhost', 'root', '', 'brit\'rock') or die("Could not connect database");

//récupération de la donnée transmise pour la requete AJAX: attribut name du lien cliqué
$band = $_GET['band'];
$result;

if(isset($band)){
	if($band == 1){
		//Requête SQL à la DB
		$result = mysqli_query($db, "SELECT * FROM rockbands WHERE id = 1");
	} else if ($band == 2) {
		$result = mysqli_query($db, "SELECT * FROM rockbands WHERE id = 2");
	} else if ($band == 3) {
		$result = mysqli_query($db, "SELECT * FROM rockbands WHERE id = 3");
	} else if ($band == 3) {
		$result = mysqli_query($db, "SELECT * FROM rockbands WHERE id = 4");
	}
}

$json_array = array();

//Recupération du tableau de donnée format PHP
while ($row = mysqli_fetch_assoc($result)) {
	$json_array[] = $row;
}

//Mise en forme du tableau au format MySQL et retour du tableau
echo json_encode($json_array);
*/