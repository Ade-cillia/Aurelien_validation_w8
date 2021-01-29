<?php

class Archer extends Character
{
    private $focus = false;
    private $quiver = 5;
    private $multipleArrows = false;
    public function __construct($name){
        parent::__construct($name);
    }

    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->quiver == 0) {
            $status = $this->dagger($target);
        } else if ($rand >= 5 || $this->focus || $this->multipleArrows) {
            $status = $this->goldenBow($target);
        } else if ($rand >= 2) {
            $status = $this->focusTarget();
        }else{
            $status = $this->loadMultipleArrows();
        }
        return $status;
    }

    public function fridgeBow($target){

        return $status;
    }
    public function focusTarget($target){
        $this->focus = true;
        $status = "$this->name se prépare à donner un gros coup !";
        return $status;
    }
    public function loadMultipleArrows($target){
        $this->focus = true;
        $status = "$this->name se prépare à donner un gros coup !";
        return $status;
    }
    public function dagger($target){

        return $status;
    }

}
