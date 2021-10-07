<?php


class TerrainDeCombat {

    public function lancerUnComvat(Personnage $perso1,Personnage $perso2){
        $perso1->frapper($perso2);
    }

}