<?php
require_once 'DBConnex.php';
class PlatProposeDAO {
	
	
    public static function ajouter($idPlat , $idService, $DateP, $quantiteeProposee, $quantiteeVendue, $prixVente){
        try{
            $sql = "insert into platproposer(idPlat, idService, DateP, quantiteeProposee, quantiteeVendue, prixVente) VALUES(:idPlat,:idService,:DateP, :quantiteeProposee, :quantiteeVendue, :prixVente);" ;
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->bindParam(":idPlat", $idPlat);
            $requetePrepa->bindParam(":idService", $idService);
			$requetePrepa->bindParam(":DateP", $DateP);
            $requetePrepa->bindParam(":quantiteeProposee", $quantiteeProposee);
            $requetePrepa->bindParam(":quantiteeVendue", $quantiteeVendue);
			$requetePrepa->bindParam(":prixVente", $prixVente);
            $reponse = $requetePrepa->execute();
			
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }
	public static function modifier($idPlat , $idService, $DateP, $quantiteeProposee, $quantiteeVendue, $prixVente){
        try{
			
			$sql3="update platproposer set DateP= :ndate, quantiteeProposee= :nquantiteeProposee, quantiteeVendue= :nquantiteeVendue, prixVente= :nprixVente where idPlat= :idPlat and idService= :idService;";
           
            $requetePrepa = DBConnex::getInstance()->prepare($sql3);
            $requetePrepa->bindParam(":idPlat", $idPlat);
            $requetePrepa->bindParam(":idService", $idService);
            $requetePrepa->bindParam(":ndate", $DateP);
            $requetePrepa->bindParam(":nquantiteeProposee", $quantiteeProposee);
			$requetePrepa->bindParam(":nquantiteeVendue", $quantiteeVendue);
            $requetePrepa->bindParam(":nprixVente", $prixVente);
            $reponse = $requetePrepa->execute();
        }catch(Exception $e){
            $reponse = "";
        }
        return $reponse;
    }

	public static function supprimer($idPlat, $idService){
        try{		
            $sql = "delete from platproposer where idPlat = :idPlat and idService= :idService ;" ;
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->bindParam(":idPlat", $idPlat);
            $requetePrepa->bindParam(":idService", $idService);
            $reponse = $requetePrepa->execute();
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

    public static function listeIdPlat(){
        
        try{
            $sql = "select idPlat from plat order by idPlat";
            
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->execute();
			$reponse = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

    public static function listeIdPlatProposee(){
        
        try{
            $sql = "select idPlat from platproposer order by idPlat";
            
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->execute();
			$reponse = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

    public static function listeNomPlat(){
        
        try{
            $sql = "select nomPlat from plat order by nomPlat";
            
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->execute();
			$reponse = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

    public static function listeService(){
        
        try{
            $sql = "select creneau from service";
            
            $requetePrepa = DBConnex::getInstance()->prepare($sql);
            $requetePrepa->execute();
			$reponse = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $reponse = 0;
        }
        return $reponse;
    }

}