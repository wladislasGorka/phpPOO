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
        echo $this->attaquant->getName() . " : " . $this->attaquant->getPv() . " ( " . $this->attaquant->getStatut() . " )<br>";
        echo $this->defenseur->getName() . " : " . $this->defenseur->getPv() . " ( " . $this->defenseur->getStatut() . " )<br>";
    }

    public function isEnded(){
         return !$this->attaquant->getStatut() || !$this->defenseur->getStatut();
    }

    public function result(){
        $perdant = (!$this->attaquant->getStatut())?$this->attaquant:$this->defenseur;
        echo "<br>".$perdant->getName()."( ".get_class($perdant)." ) est mort !";
    }

}