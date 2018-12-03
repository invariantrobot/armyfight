<?php
    // armyFight.php - Antonio Britvar - Software Development Intern Application @ Bornfight

    include('army.php');

    class armyFight {
        var $army1;
        var $army2;
        private $winner;

        private static $instance;

    		public static function getInstance($armySize1, $armySize2) {
    		    if(!isset(self::$instance)) {
    		        self::$instance = new self($armySize1, $armySize2);
    		        return self::$instance;
    			  }
    		}

    		function __construct($armySize1, $armySize2) {
             $this->army1 = new army($armySize1);
             $this->army2 = new army($armySize2);
             $this->fight($this->army1->armyArray, $this->army2->armyArray);
    		}

        private function fight($army1, $army2) {
            $a1Size = $this->army1->size;
            $a1DeathCount = 0;

            $a2Size = $this->army2->size;
            $a2DeathCount = 0;

            $attacksFirst = 2;

            while ($a1Size > 0 && $a2Size > 0) {
                if ($attacksFirst == 2) {
                  $army1[$a1DeathCount]->health -= $army2[$a2DeathCount]->attackFinal;
                  $army1[$a1DeathCount]->calculateAlive();
                   if ($army1[$a1DeathCount]->isAlive == 1) {
                      $army2[$a2DeathCount]->health -= $army1[$a1DeathCount]->attackFinal;
                      $army2[$a2DeathCount]->calculateAlive();
                        if ($army2[$a2DeathCount]->isAlive == 0) {
                            $a2DeathCount += 1;
                            $a2Size--;
                        }
                   } else {
                     $a1DeathCount += 1;
                     $a1Size--;
                     $attacksFirst--;
                   }
                } elseif ($attacksFirst == 1) {
                      $army2[$a2DeathCount]->health -= $army1[$a1DeathCount]->attackFinal;
                      $army2[$a2DeathCount]->calculateAlive();
                       if ($army2[$a2DeathCount]->isAlive == 1) {
                          $army1[$a1DeathCount]->health -= $army2[$a2DeathCount]->attackFinal;
                          $army1[$a1DeathCount]->calculateAlive();
                            if ($army1[$a1DeathCount]->isAlive == 0) {
                                $a1DeathCount += 1;
                                $a1Size--;
                            }
                       } else {
                         $a2DeathCount += 1;
                         $a2Size--;
                         $attacksFirst++;
                       }
                }
            }

            if ($a1Size > $a2Size) {
                $this->winner = 'Army 1';
            } else { $this->winner = 'Army 2'; }

            $this->army1->armyArray = $army1;
            $this->army1->aliveSoldiers = $a1Size;
            $this->army1->calculateDesertedSoldiers();
            $this->army2->armyArray = $army2;
            $this->army2->aliveSoldiers = $a2Size;
            $this->army2->calculateDesertedSoldiers();

            return true;
        }

        function showWinner() {
    /*
          echo '<pre>';
            print_r($this->army1->armyArray);
            print_r($this->army2->armyArray);
          echo '</pre>';
    */

          echo '<i>armyFight in PHP - Antonio Britvar - Software Development Intern Application @ Bornfight</i><br>
                <h2>Generated troops:</h2>
                <u>Army 1 ('.$this->army1->size.')</u><br>
                soldiers: ' . $this->army1->soldiers . '<br>
                knights: ' . $this->army1->knights . '<br>
                commanders: ' . $this->army1->commanders . '<br>
                <i>alive</i>: ' . $this->army1->aliveSoldiers . '<br>
                <i>deserted</i>: ' . $this->army1->desertedSoldiers . '<br><br>
                <u>Army 2 ('.$this->army2->size.')</u><br>
                soldiers: ' . $this->army2->soldiers . '<br>
                knights: ' . $this->army2->knights . '<br>
                commanders: ' . $this->army2->commanders . '<br>
                <i>alive</i>: ' . $this->army2->aliveSoldiers . '<br>
                <i>deserted</i>: ' . $this->army2->desertedSoldiers . '<br><br>

                <h1>Winner: '.$this->winner.'</h1>';
          }
    }
?>
