<?php
    // army.php - Antonio Britvar - Software Development Intern Application @ Bornfight

    include('army/armySoldier.php');
    include('army/armyKnight.php');
    include('army/armyCommander.php');

    class army {
        var $size;

        var $soldiers;
        var $knights;
        var $commanders;

        var $armyArray;

        var $desertedSoldiers;
        var $aliveSoldiers;

        private function calculateTroopsOdds() {
            $soldiers = floor($this->size * (random_int(72, 84)/100));
            $whatsLeft = $this->size - $soldiers;
            $knights = floor($whatsLeft * (random_int(79, 89)/100));
            $whatsLeft -= $knights;
            $commanders = $whatsLeft;

            $this->soldiers = $soldiers;
            $this->knights = $knights;
            $this->commanders = $commanders;

            return 1;
        }

        function calculateDesertedSoldiers() {
            foreach ($this->armyArray as $key => $val) {
              foreach ($val as $key2 => $val2) {
                if ($key2 == 'deserted') {
                    if ($val2 == 1) {
                        $this->desertedSoldiers++;
                    }
                }
              }
            }
        }

        private function generateArmy($number, $type) {
            while ($number > 0) {
                $this->armyArray[] = new $type;
                $number--;
            }
        }

        function __construct($armySize) {
    			   $this->size = $armySize;
             $this->desertedSoldiers = 0;
    			   $this->calculateTroopsOdds();

             $this->generateArmy($this->soldiers, 'armySoldier');
             $this->generateArmy($this->knights, 'armyKnight');
             $this->generateArmy($this->commanders, 'armyCommander');
    		}
    }
?>
