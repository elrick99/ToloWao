<?php
/**
 * Created by PhpStorm.
 * User: fabrice.bile
 * Date: 29/08/2019
 * Time: 11:52
 */

$user_id = trim($_POST['user_id']);
$user_id2 = trim($_POST['user_id2']);
require_once '../../Classes/CHANNEL.php';
require_once '../../Classes/VIDEOS.php';
require_once '../../Classes/USER.php';

$Videos = new VIDEOS();
$Users = new USER();
$Channel = new CHANNEL();




$insert = $Channel->subscribe($user_id,$user_id2);
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