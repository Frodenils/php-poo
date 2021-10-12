<?php
class Brute extends Personnage
{
    private $_magie;

    public function attaquer(Personnage $persoAFrapper): Personnage
    {
        $persoAFrapper->_degats += $this->_force;

        return $this;
    }

    public function insulter()
    {
        print("<br>BRUTE : Gnngnngnn !<br>");
    }
}
