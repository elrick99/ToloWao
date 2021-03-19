<?php
$parametres = array(
    'login' => htmlentities(trim($_POST['login'])),
    'mot_de_passe' => htmlentities(trim($_POST['mot_de_passe']))
);
require_once '../../Classes/CHANNEL.php';
require_once '../../Classes/USER.php';
$UTILISATEURS = new UTILISATEURS();
if (!isset($_SESSION['user_id'])) {
    $connexion = $UTILISATEURS->connecter($parametres['login'], $parametres['mot_de_passe']);
    if($connexion['success'] == true) {
        $_SESSION['user_id'] = $connexion['user_id'];
        $log = $UTILISATEURS->enregistrer_log(CLIENT_ADRESSE_IP,ACTIVE_URL,'CONNEXION',json_encode($parametres),$connexion['user_id']);
        $json = array(
            'success' => true,
            'date' => date('d/m/Y',time()),
            'heure' => date('H:i:s',time()),
            'commentaire' => $connexion['commentaire']
        );
    }else {
        $json = array(
            'success' => false,
            'date' => date('d/m/Y',time()),
            'heure' => date('H:i:s',time()),
            'commentaire' => $connexion['commentaire']
        );
    }
}else {
    $commentaire = 'Une session est déjà active pour cette application. Veuillez contacter votre administrateur';
    $json = array(
        'success' => false,
        'date' => date('d/m/Y',time()),
        'heure' => date('H:i:s',time()),
        'commentaire' => $commentaire
    );
}
echo json_encode($json);
?>
