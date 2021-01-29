<?php

class Archer extends Character
{
    private $focus = false;
    private $multipleArrows = false;
    private $quiver = 5;
    public function __construct($name){
        parent::__construct($name);
        $this->damage = 11;
    }

    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->quiver == 0) {
            $status = $this->dagger($target);
        } else if ($rand >= 5 || $this->focus || $this->multipleArrows) {
            $status = $this->goldenBow($target);
        } else if ($rand >= 2 && $this->quiver >= 3) {
            $status = $this->loadMultipleArrows();
        }else if($this->quiver >= 1){
            $status = $this->focusTarget();
        }else {
            $status = $this->goldenBow($target);
        }
        return $status;
    }

    public function goldenBow($target){
        $damage = $this->damage*2; // Domage de base de l'arc
        $status = "";
        if ($this->focus) {
            $damage *= rand(15,30)/10;
            $this->focus = false;
            $status = "$this->name à trouvé un point faible chez son adversaire ! <br>";
        }
        if ($this->multipleArrows) {
            $damage *= 3;
            $this->multipleArrows = false;
            $this->quiver -= 3;
            $target->setHealthPoints($this->damage);
            $status = $status."$this->name tire trois flèches en mêmes temps !!! Il reste ".$target->getHealthPoints()." points de vie à $target->name ! ";
        }else{
            $this->quiver -= 1;
            $target->setHealthPoints($this->damage);
            $status = $status."$this->name tire une flèche sur son adversaire ! Il reste ".$target->getHealthPoints()." points de vie à $target->name !";
        }

        return $status;
    }
    public function focusTarget(){
        $this->focus = true;
        $status = "$this->name recherche un point faible chez son adversaire ...";
        return $status;
    }
    public function loadMultipleArrows(){
        $this->multipleArrows = true;
        $status = "$this->name recharge son arc avec trois flèches";
        return $status;
    }
    public function dagger($target){
        $target->setHealthPoints($this->damage);
        $status = "$this->name n'a plus de flèches, il court vers son ennemie et lui enfonce sa dague";
        return $status;
    }

}
