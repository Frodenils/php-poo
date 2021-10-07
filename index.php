<?php

function chargerClasse(string $classe)
{
    include $classe . '.php';
}

spl_autoload_register('chargerClasse');

include "conf.php";

try {
    $db = new PDO($dsn, $user, $password);
    $personnagesManager = new PersonnagesManager($db);

    $unMagicien = new Magicien(
        [
            'id'=>7,
            'nom'=>'Gandalf',
            'force'=>20,
        ]);
        $unAutrePerso = new Magicien(
            [
                'id'=>8,
                'nom'=>'Les godasses',
                'force'=>20,
            ]);
            $combat = new TerrainDeCombat();
            lancerUnCombat($unMagicien, $unAutrePerso);
    $persos = $personnagesManager->getList();

    foreach ($persos as $perso) {
        print('<br/>' . $perso->getNom() . ' a ' . $perso->getForce() . ' de force, ' .
            $perso->getDegats() . ' de dégâts, ' . $perso->getExperience() . 'd\'experience et est au niveau ' . $perso->getNiveau() . '</br>');
    }

} catch (PDOException $e) {
    print('</br>Erreur de connexion : ' . $e->getMessage());
}
