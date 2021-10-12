<?php
class Archer extends Personnage
{
    private $_magie;

    public function attaquer(Personnage $persoAFrapper): Personnage
    {
        $persoAFrapper->_degats += $this->_force;

        return $this;
    }

    public function insulter()
    {
        print("<br>ARCHER : T'as du fromage dans les chaussettes ou quoi !<br>");
    }
}