<?php
    // armySoldier.php - Antonio Britvar - Software Development Intern Application @ Bornfight

    class armySoldier {
        var $health;
        var $attackInitial;
        var $attackBonus;
        var $attackFinal;
        var $isAlive;
        var $deserted;

        private function calculateBonusOdds() {
            $bonusOdds = random_int(1, 1000);
            if ($bonusOdds > 800) {
                return 2;
            } elseif ($bonusOdds > 700) {
                return 1;
            } else {
                return 0;
            }
        }

        private function suddenDesertion() {
            $chance = random_int(1, 1000);
            if (($chance > 372 && $chance < 376) || ($chance > 627 && $chance < 631)) {
                $this->deserted = 1;
                return true;
            } else { return false; }
        }

        function calculateAlive() {
            if ($this->health > 0 && $this->suddenDesertion() == 0) {
              $this->isAlive = 1;
            } else { $this->isAlive = 0; }
        }

        function __construct() {
    			   $this->health = 50;
    			   $this->attackInitial = 5;
             $this->attackBonus = $this->calculateBonusOdds();
             $this->attackFinal = $this->attackInitial + $this->attackBonus;
             $this->isAlive = 1;
             $this->deserted = 0;
    		}
    }
?>
