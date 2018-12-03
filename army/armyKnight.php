<?php
    // armyKnight.php - Antonio Britvar - Software Development Intern Application @ Bornfight

    class armyKnight extends armySoldier {

        private function calculateBonusOdds() {
            $bonusOdds = random_int(1, 1000);
            if ($bonusOdds > 830) {
                return 3;
            } elseif ($bonusOdds > 730) {
                return 2;
            } else {
                return 0;
            }
        }

        function __construct() {
    			   $this->health = 60;
    			   $this->attackInitial = 6;
             $this->attackBonus = $this->calculateBonusOdds();
             $this->attackFinal = $this->attackInitial + $this->attackBonus;
             $this->isAlive = 1;
             $this->deserted = 0;
    		}
    }
?>
