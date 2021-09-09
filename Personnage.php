<?php

class Personnage
{
    private $_nom = 'Inconnu';
    private $_force = 50;
    private $_experience = 1;
    private $_degats = 0;

    public function __construct($nom, $force = 50, $degats = 0)
    {
        $this->setNom($nom);
        $this->setForce($force);
        $this->setDegats($degats);
        $this->setExperience(1);
        print("Le personnage " . $nom . " est créé </br>");
    }
    public function __toString()
    {
        return $this->getNom() . " (" . $this->getDegats() . ")";
    }

    public function setNom($nom)
    {
        if (!is_string($nom)) {
            trigger_error('Le nom d\'un personnage doit être un texte', E_USER_ERROR);
            return;
        }
        $this->_nom = $nom;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function setForce($force)
    {
        if (!is_int($force)) {
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        if ($force > 100) {
            trigger_error('La force d\'un personnage ne peut pas dépasser 100', E_USER_WARNING);
            return;
        }
        $this->_force = $force;
    }
    public function getForce()
    {
        return $this->_force;
    }

    public function setDegats($degats)
    {
        if (!is_int($degats)) {
            trigger_error('Les degats d\'un personnage doivent être un nombre entier', E_USER_WARNING);
            return;
        }
        $this->_degats = $degats;
    }

    public function getDegats()
    {
        return $this->_degats;
    }

    public function setExperience($experience)
    {
        if (!is_int($experience)) {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        if ($experience > 100) {
            trigger_error('L\'expérience d\'un personnage ne peut pas dépasser 100', E_USER_WARNING);
            return;
        }
        $this->_experience = $experience;
    }
    public function gagnerExperience()
    {
        $this->_experience++;
    }

    public function getExperience()
    {
        return $this->_experience;
    }

    public function parler()
    {
        print('Je suis un personnage!');
    }

    public function frapper(Personnage $adversaire)
    {
        $adversaire->_degats += $this->_force;
        $this->gagnerExperience();
        print('</br>' . $adversaire->getNom() . ' à été frappé par '
            . $this . ' -> Dégats de ' . $adversaire . ' = ' . $adversaire->getDegats());
    }

}
