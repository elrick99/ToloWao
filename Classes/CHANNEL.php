<?php
include "BDD.php";

class CHANNEL extends BDD
{
    public function lister($statut)
    {
        $query = "
        SELECT * FROM 
            channel
        WHERE 
             channel_statut LIKE ? 
       
        ";

        $a = $this->bdd->prepare($query);
        $a->execute(array('%' . $statut . '%'));
        $json = $a->fetchAll();
        return $json;
    }
    public function subscribe($user_id, $user_id2)
    {

        $query = "INSERT INTO abonnement( channel_id, user_id,date_reg)
        VALUES( :channel_id,:user_id, :date_reg)";
        $a = $this->bdd->prepare($query);
        $a->execute(array(
            'channel_id' => $user_id,
            'user_id' => $user_id2,
            'date_reg' => date('Y-m-d H:i:s',time()),

        )) or die("Erreur d'insertion du nouveaux produit.");

        $messages = 'Enregistrement d\'un nouveau produits effectué avec succès.';
        $json = array(
            'success' => true,
            'date' => date('d/m/Y', time()),
            'heure' => date('H:i:s', time()),
            'user_id' => $user_id2,
            'messages' => $messages,


        );
        return $json;
    }


}