<?php
/**
 * Created by PhpStorm.
 * User: fabrice.bile
 * Date: 29/08/2019
 * Time: 11:52
 */

$video_id = trim($_POST['video_id']);
$libelle = trim($_POST['commentaire']);
$user_id = trim($_POST['user_id']);
require_once '../../Classes/CHANNEL.php';
require_once '../../Classes/VIDEOS.php';

$Videos = new VIDEOS();
$Channel = new CHANNEL();




                $insert = $Videos->Ajouter_commentaire($libelle,$video_id,NULL);
                if($insert){
                    $json = array(
                        'success' => true,
                        'message' =>'SUPER'
                    );
                }else{
                    $json = array(
                        'success' => false,
                        'message' => 'ECHEC AJOUT DE L\'UTILISATEUR AJOUTE A L\'AGENCE.'
                    );
                }

echo json_encode($json);
?>