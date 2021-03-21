<?php
/**
 * Created by PhpStorm.
 * User: fabrice.bile
 * Date: 29/08/2019
 * Time: 11:52
 */

$user_id = 1223413 ;
$pseudo = trim($_POST['pseudo']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$password2 = trim($_POST['password2']);
$sexe = trim($_POST['sexe']);
$age = trim($_POST['age']);
//$photo = trim($_POST['photo']);
require_once '../../Classes/CHANNEL.php';
require_once '../../Classes/VIDEOS.php';
require_once '../../Classes/USER.php';

$Videos = new VIDEOS();
$Channel = new CHANNEL();
$User = new USER();

if ($password  == $password2) {
    $insert = $User->Editer($user_id, $pseudo,$email, $password, $age, $sexe);
    if ($insert) {
        $json = array(
            'success' => true,
            'message' => 'SUPER'
        );
    } else {
        $json = array(
            'success' => false,
            'message' => 'ECHEC AJOUT DE L\'UTILISATEUR AJOUTE A L\'AGENCE.'
        );
    }
}else{
    $json = array(
        'success' => false,
        'message' => 'MOT DE PASSE INCORRECT.'
    );
}

echo json_encode($json);
?>