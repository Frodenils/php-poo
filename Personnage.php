<?php

class Personnage
{
    private $_nom = 'Inconnu';
    private $_force = 50;
    private $_experience = 1;
    private $_degats = 0;

    public function __construct(string $nom, int $force = 50, int $degats = 0)
    {
        $this->setNom($nom);
        $this->setForce($force);
        $this->setDegats($degats);
        $this->setExperience(1);
        print("Le personnage " . $nom . " est créé </br>");
    }
    public function __toString():string
    {
        return $this->getNom() . " : Force = ".$this.getForce()." / Force = ".$this.getDegats()." / Force = ".$this.getExperience();

    }

    public function setNom(string $nom):Personnage
    {
        if (!is_string($nom)) {
            trigger_error('Le nom d\'un personnage doit être un texte', E_USER_ERROR);
            return $this;
        }
        $this->_nom = $nom;
        return $this;
    }
    public function getNom():string
    {
        return $this->_nom;
    }
    public function setForce(int $force):Personnage
    {
        if (!is_int($force)) {
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return $this;
        }
        if ($force > 100) {
            trigger_error('La force d\'un personnage ne peut pas dépasser 100', E_USER_WARNING);
            return $this;
        }
        $this->_force = $force;
        return $this;
    }
    public function getForce():int
    {
        return $this->_force;
    }

    public function setDegats($degats):Personnage
    {
        if (!is_int($degats)) {
            trigger_error('Les degats d\'un personnage doivent être un nombre entier', E_USER_WARNING);
            return $this;
        }
        $this->_degats = $degats;
        return $this;
    }

    public function getDegats():int
    {
        return $this->_degats;
    }

    public function setExperience($experience):Personnage
    {
        if (!is_int($experience)) {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return $this;
        }
        if ($experience > 100) {
            trigger_error('L\'expérience d\'un personnage ne peut pas dépasser 100', E_USER_WARNING);
            return $this;
        }
        $this->_experience = $experience;
        return $this;
    }
    public function gagnerExperience():Personnage
    {
        $this->_experience++;
        return $this;
    }

    public function getExperience():int
    {
        return $this->_experience;
    }

    public function parler():Personnage
    {
        print('Je suis un personnage!');
        return $this;
    }

    public function frapper(Personnage $adversaire):Personnage
    {
            $adversaire->_degats += $this->_force;
            $this->gagnerExperience();
            print('</br>' . $adversaire->getNom() . ' à été frappé par '
                . $this . ' -> Dégats de ' . $adversaire . ' = ' . $adversaire->getDegats());
                return $this;

    }

}
