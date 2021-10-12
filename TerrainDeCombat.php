<?php
class TerrainDeCombat
{
    public function lancerUnCombat(Personnage $perso1, Personnage $perso2, Personnage $perso3)
    {
        $perso1->attaquer($perso2);

        if ($perso1 instanceof Voleur){
            print("<br/>". $perso1->getNom()." est un voleur");
            $perso1->extraireDeLaPoche($perso2,25);
        }
        print("<br>" . $perso1);
        print("<br>" . $perso2);

        $perso1->insulter();
        $perso2->insulter();
    }
}
