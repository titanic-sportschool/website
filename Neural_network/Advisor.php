<?php
    include_once("/Net.class.php");

    class Advisor {
        private $net;

        public function __construct() {
            $this->net = new Net();
            $this->net->import('./nets/Advisor');
        }

        public function getAdvice($gender, $age, $totalTime, $totalCalories) {
            // Add input
            $inputVals = [];
            array_push($inputVals, $gender);
            array_push($inputVals, $age);
            array_push($inputVals, $totalTime);
            array_push($inputVals, $totalCalories);
            $this->net->feedForward($inputVals);

            // Get results
            $results = $this->net->getResults();
            print(round($results[0]) ? 'U sport <b>meer</b> dan gemiddeld' : 'U sport <b>minder</b> dan gemiddeld');
            echo "<br>";
            print(round($results[1]) ? 'U verbrand gemiddeld <b>meer</b> calorieën' : 'U verbrand gemiddeld <b>minder</b> calorieën');
            echo "<br>";
            print(round($results[2]) ? 'U verbrand gemiddeld <b>meer</b> calorieën per minuut' : 'U verbrand gemiddeld <b>minder</b> calorieën per minuut');
        }
    }

    $advisor = new Advisor();
    $advisor->getAdvice(0, 21, 135, 1305);
?>
