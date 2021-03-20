<?php

class USER extends BDD
{
    public function generer_user_id($ip_adresse)
    {
        if ($ip_adresse) {
            $user_id = str_replace('.', '', str_replace(':', '', $ip_adresse)) . date('dmyhis');
            $commentaire = 'Nouvel ID Utilisateur généré avec succès.';
            $json = array(
                'success' => true,
                'date' => date('d/m/Y', time()),
                'heure' => date('H:i:s', time()),
                'commentaire' => $commentaire,
                'user_id' => $user_id
            );
        } else {
            $commentaire = 'Impossible de générer un id à partir de ce compte, prière de contacter votre administrateur.';
            $json = array(
                'success' => false,
                'date' => date('d/m/Y', time()),
                'heure' => date('H:i:s', time()),
                'commentaire' => $commentaire
            );
        }
        return $json;
    }
    public function Editer($user_id, $pseudo,$email, $password,$age, $sexe)
    {

        $query = "INSERT INTO users (u_id, pseudo,email, password,age,sexe, date_reg, photo)
        VALUES(:u_id, :pseudo,:email, :password,:age ,:sexe, :date_reg, :photo)";
        $a = $this->bdd->prepare($query);
        $a->execute(array(
            'u_id' => $user_id,
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $password,
            'age' => $age,
            'photo' => 1,
            'sexe' => $sexe,
            'date_reg' => date('Y-m-d H:i:s',time())


        )) or die("Erreur d'insertion du nouveaux produit.");

        $messages = 'Enregistrement d\'un nouveau produits effectué avec succès.';
        $json = array(
            'success' => true,
            'date' => date('d/m/Y', time()),
            'heure' => date('H:i:s', time()),
            'pseudo' => $pseudo,
            'user_id' => $user_id,
            'messages' => $messages,


        );
        return $json;
    }
    public function connecter($pseudo, $mot_de_passe)
    {
        $a = $this->bdd->prepare('SELECT u_id AS user_id,pseudo,  email, password, age, sexe,user_statut FROM users WHERE pseudo = ?');
        $a->execute(array($pseudo));
        $utilisateur = $a->fetch();
        if ($utilisateur) {
            if ($mot_de_passe == $utilisateur['password']) {

                if ($utilisateur['user_statut'] == 1) {
                    $commentaire = 'Connexion effectuée avec succès.';
                    $json = array(
                        'success' => true,
                        'date' => date('d/m/Y', time()),
                        'heure' => date('H:i:s', time()),
                        'user_id' => $utilisateur['user_id'],
                        'pseudo' => $utilisateur['pseudo'],
                        'commentaire' => $commentaire
                    );
                } else {
                    $commentaire = 'Votre compte est inactif. Veuillez contacter votre administrateur.';
                    $json = array(
                        'success' => false,
                        'date' => date('d/m/Y', time()),
                        'heure' => date('H:i:s', time()),
                        'commentaire' => $commentaire
                    );
                }
            } else {
                $commentaire = 'Ce code utilisateur / email et/ou le mot de passe est incorrect.';
                $json = array(
                    'success' => false,
                    'date' => date('d/m/Y', time()),
                    'heure' => date('H:i:s', time()),
                    'commentaire' => $commentaire
                );
            }
        } else {
            $commentaire = 'Ce code utilisateur / email est incorrect.';
            $json = array(
                'success' => false,
                'date' => date('d/m/Y', time()),
                'heure' => date('H:i:s', time()),
                'commentaire' => $commentaire
            );
        }
        return $json;
    }
    public function trouver($user_id)
    {
        $query = "
        SELECT 
               u_id AS user_id, 
               pseudo AS pseudo, 
               email AS email,  
               password AS mot_de_passe, 
               user_statut AS statut, 
                date_reg
        FROM 
             users 
        WHERE 
              u_id LIKE ? 
        
          
        ";
        $a = $this->bdd->prepare($query);
        $a->execute(array($user_id));
        $json = $a->fetch();
        return $json;
    }
}