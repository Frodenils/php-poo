<?php
    include 'header.php';

    $id = (int)$_GET["id"];

    try
    {
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $personnagesManager = new PersonnagesManager($db);
        $perso = $personnagesManager->getOne($id);

        print('<table>');
        print('<tr>');
        print('<td>Nom : </td><td>' . $perso->getNom() . '</td>');
        print('<td>Force : </td><td>' . $perso->getForce() . '</td>');
        print('<td>Dégats : </td><td>' . $perso->getDegats() . '</td>');
        print('<td>Expérience : </td><td>' . $perso->getExperience() . '</td>');
        print('<td>Niveau : </td><td>' . $perso->getNiveau() . '</td>');
        print('</tr>');
        print('</table>');
    }
    
    catch (PDOException $e)
    {
        print('<br/>Erreur de connexion : ' . $e->getMessage());
    }
?>