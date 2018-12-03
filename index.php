<?php
    // index.php - Antonio Britvar - Software Development Intern Application @ Bornfight

    include('armyFight.php');

    if(isset($_GET['army1'], $_GET['army2'])) {
        $army1 = $_GET['army1'];
        $army2 = $_GET['army2'];

        $aF = armyFight::getInstance($army1, $army2);
        $aF->showWinner();
    } else {
        echo 'Please add GET parameters (army1 and army2) in the URL.';
    }
?>
