<?php
/**
 * Created by PhpStorm.
 * User: fabrice.bile
 * Date: 29/08/2019
 * Time: 11:52
 */

$agence = trim($_POST['agence']);
$id = trim($_POST['user_id']);
require_once '../../../Classes/UTILISATEURS.php';
require_once '../../../Classes/AGENCESUTILISATEURS.php';

$Utilisateurs = new UTILISATEURS();
$AgencesUtilisateurs = new AgencesUtilisateurs();

if(empty($_SESSION['user_id'])) {
    $json = array(
        'status' => 'failed',
        'message' => "VOTRE IDENTIFIANT EST INCONNU. VOUS NE POUVEZ PAS EFFECTUER CETTE ACTION. VEUILLEZ CONTACTER VOTRE ADMINISTRATEUR SYSTEME."
    );
}else {
    $user = $Utilisateurs->trouver($_SESSION['user_id'],NULL,NULL,NULL);
    if(empty($user['user_id'])) {
        $json = array(
            'status' => 'failed',
            'message' => "VOTRE IDENTIFIANT EST INCORRECT. VOUS NE POUVEZ PAS EFFECTUER CETTE ACTION. VEUILLEZ CONTACTER VOTRE ADMINISTRATEUR SYSTEME."
        );
    }else {
        if($user['statut'] == 1) {
            if(!empty($agence) && !empty($id)){
                $insert = $AgencesUtilisateurs->ajouter_utilisateur_a_agence($agence,$id,$_SESSION['user_id']);
                if($insert['status'] == 'success'){
                    $json = array(
                        'status' => 'success',
                        'message' => $insert['message']
                    );
                }else{
                    $json = array(
                        'status' => 'failed',
                        'message' => 'ECHEC AJOUT DE L\'UTILISATEUR AJOUTE A L\'AGENCE.'
                    );
                }
            }
        }else {
            $json = array(
                'status' => 'failed',
                'message' => "VOTRE IDENTIFIANT A ETE DESACTIVE. VOUS NE POUVEZ PAS EFFECTUER CETTE ACTION. VEUILLEZ CONTACTER VOTRE ADMINISTRATEUR SYSTEME."
            );
        }
    }
}
echo json_encode($json);
?>