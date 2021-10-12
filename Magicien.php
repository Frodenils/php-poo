<?php
class Magicien extends Personnage
{
    private $_magie;

    public function attaquer(Personnage $persoAFrapper): Personnage
    {
        $persoAFrapper->_degats += $this->_magie;

        return $this;
    }

    public function insulter()
    {
        print("<br>MAGICIEN : Lèche moi le diams !<br>");
    }
}