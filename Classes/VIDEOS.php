<?php


class VIDEOS extends  BDD
{
    public function lister()
    {
        $query = "
        SELECT * FROM 
            video   
        ";

        $a = $this->bdd->prepare($query);
        $a->execute(array());
        $json = $a->fetchAll();
        return $json;
    }
    public function trouver_video($code){
        $a = $this->bdd->prepare('SELECT * FROM video WHERE video_id = ? ');
        $a ->execute(array($code));
        $json = $a->fetch();
        return $json;
    }
    public function Ajouter_commentaire($libelle, $video_id, $user_id)
    {

        $query = "INSERT INTO commentaire( video_id, libelle,date_reg, u_id)
        VALUES( :video_id, :c_libelle,:date_reg, :user_reg)";
        $a = $this->bdd->prepare($query);
        $a->execute(array(
            'c_libelle' => $libelle,
            'video_id' => $video_id,
            'user_reg' => $user_id,
            'date_reg' => date('Y-m-d H:i:s',time()),

        )) or die("Erreur d'insertion du nouveaux produit.");

        $messages = 'Enregistrement d\'un nouveau produits effectué avec succès.';
        $json = array(
            'success' => true,
            'date' => date('d/m/Y', time()),
            'heure' => date('H:i:s', time()),
            'c_libelle' => $libelle,
            'user_id' => $user_id,
            'messages' => $messages,


        );
        return $json;
    }
    public function lister_commentaire($code)
    {
        $query = "
        SELECT * FROM 
            commentaire   
            WHERE
            video_id LIKE ?
            ORDER BY  date_reg DESC
        ";

        $a = $this->bdd->prepare($query);
        $a->execute(array($code));
        $json = $a->fetchAll();
        return $json;
    }
    public function like($video_id, $user_id)
    {

        $query = "INSERT INTO likes( video_id,u_id,date_reg)
        VALUES( :video_id, :user_reg,:date_reg)";
        $a = $this->bdd->prepare($query);
        $a->execute(array(
            'video_id' => $video_id,
            'user_reg' => $user_id,
            'date_reg' => date('Y-m-d H:i:s',time()),

        )) or die("Erreur d'insertion du nouveaux produit.");

        $messages = 'Enregistrement d\'un nouveau produits effectué avec succès.';
        $json = array(
            'success' => true,
            'date' => date('d/m/Y', time()),
            'heure' => date('H:i:s', time()),
            'user_id' => $user_id,
            'messages' => $messages,


        );
        return $json;
    }
    public function dislikes($video_id,$user_id)
    {

        $query = "INSERT INTO dislike( u_id,video_id,date_reg)
        VALUES( :user_reg, :video_id,:date_reg)";
        $a = $this->bdd->prepare($query);
        $a->execute(array(
            'video_id' => $video_id,
            'user_reg' => $user_id,
            'date_reg' => date('Y-m-d H:i:s',time()),

        )) or die("Erreur d'insertion du nouveaux produit.");

        $messages = 'Enregistrement d\'un nouveau produits effectué avec succès.';
        $json = array(
            'success' => true,
            'date' => date('d/m/Y', time()),
            'heure' => date('H:i:s', time()),
            'user_id' => $user_id,
            'messages' => $messages,


        );
        return $json;
    }
    public function lister_like($code)
    {
        $query = "
        SELECT * FROM 
            likes   
       WHERE video_id = ?
        ";

        $a = $this->bdd->prepare($query);
        $a->execute(array($code));
        $json = $a->fetchAll();
        return $json;
    }
    public function lister_dislike($code)
    {
        $query = "
        SELECT * FROM 
            dislike   
       WHERE video_id = ?
        ";

        $a = $this->bdd->prepare($query);
        $a->execute(array($code));
        $json = $a->fetchAll();
        return $json;
    }

}