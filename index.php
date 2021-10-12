<?php
include 'header.php';

try
{
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    print('<br>Liste des personnages : ');

    $unMagicien = new MagicienVoleur(
        [
            'id' => 7, 'nom' => 'Gandalf', 'force' => 20,
        ]);

    print("<br>Mon nouveau personnage = " . $unMagicien->getNom());

    $unArcher = new Archer(
        [
            'id' => 8, 'nom' => 'Les godasses', 'force' => 20,
        ]);

    print("<br>Mon nouveau personnage = " . $unArcher->getNom());

    $uneBrute = new Brute(
        [
            'id' => 8, 'nom' => 'Célien', 'force' => 20,
        ]);

    print("<br>Mon nouveau personnage = " . $uneBrute->getNom());

    $combat = new TerrainDeCombat();
    $combat->lancerUnCombat($unMagicien, $unArcher, $uneBrute);

    $personnagesManager = new PersonnagesManager($db);
    $personnages = $personnagesManager->getList();

    foreach ($personnages as $personnage) {
        print('<br/><a target="_blank" href="personnage_view.php?id=' . $personnage->getId() . '">' . $personnage->getNom() . '</a>');
    }

} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}
?>