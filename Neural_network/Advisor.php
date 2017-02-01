<?php
    include_once("/Net.class.php");

    class Advisor {
        private $net;

        public function __construct() {
            $this->net = new Net();
            $this->net->import('./Neural_network/nets/Advisor');
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
            print(round($results[0]) ? 'U sport meer dan gemiddeld!' : 'U sport minder dan gemiddeld!');
            echo "<br>";
            print(round($results[1]) ? 'U verbrand gemiddeld meer calorieën' : 'U verbrand gemiddeld minder calorieën');
            echo "<br>";
            print(round($results[2]) ? 'Lekker bezig!' : 'Dat kan beter!');
        }
    }

    // $advisor = new Advisor();
    // $advisor->getAdvice(1, 21, 135, 1305);
?>
