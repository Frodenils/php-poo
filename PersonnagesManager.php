<?php
class PersonnagesManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db): PersonnagesManager
    {
        $this->_db = $db;

        return $this;
    }

    public function getOne(int $id)
    {
        $sth = $this->_db->prepare('SELECT id, nom, `forces`, degats, niveau, experience FROM personnages WHERE id = ?');
        $sth->execute(array($id));
        $ligne = $sth->fetch();
        $perso = new Personnage($ligne);

        return $perso;
    }

    public function getList(): array
    {
        $listeDePersonnages = array();
        $request = $this->_db->query('SELECT id, nom, `forces`, degats, niveau, experience, classe FROM personnages;');

        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            switch ((int) $ligne['classe']) {
                case Personnage::MAGICIEN:
                    $perso = new Magicien($ligne);

                    break;

                case Personnage::ARCHER:
                    $perso = new Archer($ligne);

                    break;

                case Personnage::BRUTE:
                    $perso = new Brute($ligne);

                    break;

                default:
                    break;
            }
        }

        return $listeDePersonnages;
    }
}
