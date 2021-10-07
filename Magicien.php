<?php

class Magicien extends Personnage
{
    private $_magie;

    public function lancerUnSort(Personnage $persoAFrapper): Personnage
    {
//    $perso->recevoirDegats($this->_magie);
        $persoAFrapper->_degats += $this->_magie;
        parent::frapper($persoAFrapper);
        return $this;
    }

}
