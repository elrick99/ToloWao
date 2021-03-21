<?php
$data = array(
    'pseudo' => htmlentities(trim($_POST['pseudo'])),
    'password' => htmlentities(trim($_POST['password']))
);
require_once '../../Classes/CHANNEL.php';
require_once '../../Classes/USER.php';
$UTILISATEURS = new USER();
if (!isset($_SESSION['user'])) {
    $connexion = $UTILISATEURS->connecter($data['pseudo'], $data['password']);
    if($connexion['success'] == true) {
        $_SESSION['user_id'] = $connexion['user_id'];
        $json = array(
            'success' => true,
            'date' => date('d/m/Y',time()),
            'heure' => date('H:i:s',time()),
            'commentaire' => $connexion['commentaire'],
            'pseudo' => $connexion['pseudo']
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
        'success' => true,
        'date' => date('d/m/Y',time()),
        'heure' => date('H:i:s',time()),
        'commentaire' => $commentaire
    );
}
echo json_encode($json);
?>
