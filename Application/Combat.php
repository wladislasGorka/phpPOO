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
            echo "<br>Debut du combat!";
            echo "<br>".$this->attaquant->getName()."( ".get_class($this->attaquant)." ) contre ".$this->defenseur->getName()."( ".get_class($this->defenseur)." )<br>";

        }
        if($this->turn %2 == 0){
            $this->attaque($this->attaquant, $this->defenseur);
        }else{
            $this->attaque($this->defenseur, $this->attaquant);
        }
        $this->turnState();
        $this->turn++;
    }

    private function attaque(Personnage $attaquant, Personnage $defenseur){
        $strike = $defenseur->defendre()-$attaquant->attaquer();
            if($strike<0){
                $defenseur->setPv($defenseur->getPv()+$strike);
            }
    }

    private function turnState(){
        echo "<br>Turn $this->turn: <br>";
        echo $this->attaquant->getName() . " : " . $this->attaquant->getPv() . " pv <br>";
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