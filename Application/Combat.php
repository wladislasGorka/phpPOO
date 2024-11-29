<?php
class Combat{
    private $attaquant;
    private $defenseur;
    private $turn;
    
    public function __construct(Personnage $attaquant, Personnage $defenseur){
        $this->attaquant = $attaquant;
        $this->defenseur = $defenseur;
        $this->turn = 0;
    }

    public function turn(){
        if($this->turn == 0){
            echo "<br>Debut du combat!<br>";
            echo $this->attaquant->getName()."( ".get_class($this->attaquant)." ".$this->attaquant->getTalent()." avec ".$this->attaquant->getArme()." ) contre ".$this->defenseur->getName()."( ".get_class($this->defenseur)." ".$this->defenseur->getTalent()." avec ".$this->defenseur->getArme()." )";

        }
        echo "<br><br>Turn $this->turn:";
        if($this->turn %2 == 0){
            echo " ".$this->attaquant->getName()." attaque! <br>";
            $this->attaque($this->attaquant, $this->defenseur);
        }else{
            echo " ".$this->defenseur->getName()." attaque! <br>";
            $this->attaque($this->defenseur, $this->attaquant);
        }
        $this->turnState();
        $this->turn++;
    }

    public function attaque(Personnage $attaquant, Personnage $defenseur){
        $degats = $attaquant->attaquer()-$defenseur->defendre();
            if($degats>0){
                $defenseur->setPv($defenseur->getPv()-$degats);
            }
    }

    public function turnState(){        
        echo "<br>".$this->attaquant->getName() . " : " . $this->attaquant->getPv() . " pv // ";
        echo $this->defenseur->getName() . " : " . $this->defenseur->getPv() . " pv <br>";
    }

    public function isEnded(){
         return !$this->attaquant->getStatut() || !$this->defenseur->getStatut();
    }

    public function result(){
        $perdant = (!$this->attaquant->getStatut())?$this->attaquant:$this->defenseur;
        echo "<br>".$perdant->getName()."( ".get_class($perdant)." ) est mort !<br>";
        return get_class($perdant);
    }

}