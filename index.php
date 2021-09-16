<?php

function chargerClasse(string $classe){
    include $classe.'.php';
}

spl_autoload_register('chargerClasse');

include "conf.php";

try {
    $db = new PDO($dsn, $user, $password);
    $personnagesManager = new PersonnagesManager($db);
/*     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    if ($db){
        print('</br>Lecture dans la base de donnée :</br>');
        $request = $db->query('SELECT id, nom, `forces`, degats, niveau, experience FROM personnages;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            # code...
            $perso = new Personnage($ligne);
            print('<br/>'.$perso->getNom().' a '.$perso->getForce(). ' de force, '. 
            $perso->getDegats().' de dégâts, '.$perso->getExperience(). 'd\'experience et est au niveau '.$perso->getNiveau().'</br>'); 
        }
    }
    */
} catch (PDOException $e){
    print('</br>Erreur de connexion : '.$e->getMessage());
}
