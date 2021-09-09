<?php

class Personnage
{
    private $_nom = 'Inconnu';
    private $_force = 50;
    private $_experience = 1;
    private $_degats = 0;

    public function definirForce($force)
    {
        $this->_force = $force;
    }

    public function definirDegats($degats)
    {
        $this->_degats = $degats;
    }

    public function afficherDegats()
    {
        return $this->_degats;
    }

    public function definirExperience($experience)
    {
        $this->_experience = $experience;
    }

    public function parler()
    {
        print('Je suis un personnage!');
    }

    public function frapper($adversaire)
    {
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();
    }

    public function gagnerExperience()
    {
        $this->_experience++;
    }

    public function afficherExperience()
    {
        return $this->_experience;
    }
}
