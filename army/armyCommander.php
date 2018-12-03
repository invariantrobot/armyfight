<?php
    // armyCommander.php - Antonio Britvar - Software Development Intern Application @ Bornfight

    class armyCommander extends armySoldier {

        private function calculateBonusOdds() {
            $bonusOdds = random_int(1, 1000);
            if ($bonusOdds > 920) {
                return 4;
            } elseif ($bonusOdds > 800) {
                return 2;
            } else {
                return 0;
            }
        }

        private function suddenDesertion() {
            $chance = random_int(1, 1000);
            if ($chance > 418 && $chance < 422) {
                $this->deserted = 1;
                return true;
            } else { return false; }
        }

        function __construct() {
    			   $this->health = 70;
    			   $this->attackInitial = 7;
             $this->attackBonus = $this->calculateBonusOdds();
             $this->attackFinal = $this->attackInitial + $this->attackBonus;
             $this->isAlive = 1;
             $this->deserted = 0;
    		}
    }
?>
