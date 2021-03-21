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

}