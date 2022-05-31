<?php
require_once 'DBConnex.php';
class PlatDAO {

	
    public static function ajouter($idCategorie , $nomPlat, $descriptifPlat){
        try{
			//$sql = "select idCatgorie from categorie_plat where libelleCateg = :categorie;"
            //$requetePrepa = DBConnex::getInstance()->prepare($sql);
            $sql2 = "insert into plat(idCategorie, nomPlat, descriptifPlat) VALUES(:categorie,:nom,:descriptif);" ;
            $requetePrepa = DBConnex::getInstance()->prepare($sql2);
            $requetePrepa->bindParam(":categorie", $idCategorie);
            $requetePrepa->bindParam(":nom", $nomPlat);
			$requetePrepa->bindParam(":descriptif", $descriptifPlat);
            $reponse = $requetePrepa->execute();
			
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }
	public static function modifier($idCategorie , $nomPlat, $descriptifPlat, $ancienNompPlat){
        try{
			
			$sql3="update plat set idCategorie= :ncategorie, nomPlat= :nnom, descriptifPlat= :ndescriptif where nomPlat= :anomPlat;";
           
            $requetePrepa = DBConnex::getInstance()->prepare($sql3);
            $requetePrepa->bindParam(":ncategorie", $idCategorie);
            $requetePrepa->bindParam(":nnom", $nomPlat);
			$requetePrepa->bindParam(":ndescriptif", $descriptifPlat);
            $requetePrepa->bindParam(":anomPlat", $ancienNompPlat);
            $reponse = $requetePrepa->execute();
        }catch(Exception $e){
            $reponse = "";
        }
        return $reponse;
    }

	public static function supprimer($nomPlat){
        try{		
            $sql = "delete from plat where nomPlat = :nom;" ;
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->bindParam(":nom", $nomPlat);
            $reponse = $requetePrepa->execute();
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

    public static function getTabPlat(){
        try{		
            $sql = "select * from plat" ;
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->execute();
			$reponse = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

    public static function listeCategoriePlat(){
        
        try{
            $sql = "select libelleCateg from categorie_plat order by libelleCateg";
            
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->execute();
			$reponse = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

}