<?php

function chargerClasse(string $classe){
    include $classe.'.php';
}

spl_autoload_register('chargerClasse');



try {
    $db = new PDO($dsn, $userr, $password);
    if ($db){
        print('</br>Lecture dans la base de donnée :');
    }
}
