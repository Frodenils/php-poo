<?php

function chargerClasse(string $classe){
    include $classe.'.php';
}

spl_autoload_register('chargerClasse');



print("<h1>Jeu de Combat</h1>");

$perso1 = new Personnage("Mario");
$perso2 = new Personnage("Luigi", 60, 0);

print("Dégats du perso1 = " . $perso1->setNom("Mario2")->setExperience(15)->frapper($perso2)->getDegats());
$perso2->setExperience(1);
$perso2->frapper($perso1);

print("<br/>Dégats du personnage 1 : " . $perso1->getDegats());
print("<br/>Dégats du personnage 2 : " . $perso2->getDegats());
print("<br/>Résultat du combat<br/>");
print($perso1);
print($perso2);
