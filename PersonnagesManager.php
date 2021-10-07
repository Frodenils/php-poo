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

    public function add(Personnage $perso): Personnage
    {
        // Préparation de la requête d'insertion.
        // Assignation des valeurs pour le nom, la force, les dégâts, l'expérience et le niveau du personnage.
        // Exécution de la requête.
    }

    public function delete(Personnage $perso): bool
    {
        // Préparation de la requête d'insertion.
        // Assignation des valeurs pour le nom, la force, les dégâts, l'expérience et le niveau du personnage.
        // Exécution de la requête.
    }

    public function getOne(int $id)
    {
        $sth = $this->_db->prepare('SELECT id, classe, nom, `force`, degats, niveau, experience FROM personnages WHERE id = ?');
        $sth->execute(array($id));
        $ligne = $sth->fetch();
        $perso = new Personnage($ligne);
        return $perso;
    }

    public function getList(): array
    {
        $listeDePersonnages = array();
        // Retourne la liste de tous les personnages.
        $request = $this->_db->query('SELECT id, classe, nom, `force`, degats, niveau,
        experience FROM personnages;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
        {

            // $perso = new Personnage($ligne);
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
            $listeDePersonnages[] = $perso;
        }
        return $listeDePersonnages;
    }

    public function update(Personnage $perso): bool
    {
        // Prépare une requête de type UPDATE.
        // Assignation des valeurs à la requête.
        // Exécution de la requête.
    }

}
