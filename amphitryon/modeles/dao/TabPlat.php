<?php

	$sql = "SELECT categorie_plat.libelleCateg, nomPlat, descriptifPlat,prixPlat FROM `plat`,`categorie_plat`
	where plat.idCategorie=categorie_plat.idCategorie" ;
	$requetePrepa = DBConnex::getInstance()->prepare($sql);
	$requetePrepa->execute();
	$reponse = $requetePrepa->fetch(PDO::FETCH_ASSOC);
	echo "<table>"
	foreach($sql as $value){
		echo