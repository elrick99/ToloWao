<?php
session_start();
//define('CONFIGS', DIR . '_configs/');
//define('PUBLICS', URL . '_publics/');

class BDD
{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "tolowao_db";


    public function __construct($host = null, $user = null, $pass = null, $dbname = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->dbname = $dbname;
        }
        try {
            $this->bdd = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_LOCAL_INFILE => true
            ));
        } catch (PDOException $e) {
            echo 'Message: ' . $e->getMessage();
            //die('{"status": false,"message": "Impossible de se connecter à la base de données. <br />Veuillez contacter votre administrateur."}');
        }
    }

    public function query($sql, $data = array())
    {
        $req = $this->bdd->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBdd()
    {
        return $this->bdd;
    }
}

?>