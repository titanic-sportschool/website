<?php
// DATA BASE STUFF
include_once("../DB.php");

// Get Used equipment from database
$sql = "SELECT * FROM Equipment_used";
$query = mysqli_query($db, $sql);
$equipment_used = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Get users from database
$sql = "SELECT * FROM User";
$query = mysqli_query($db, $sql);
$users = mysqli_fetch_all($query, MYSQLI_ASSOC);

$totalWomen = 0;
$totalMen = 0;
$totalTimeWomen = 0;
$totalTimeMen = 0;
$totalCaloriesWomen = 0;
$totalCaloriesMen = 0;

// Merge users and equipment in 1 array
$user_activities = array();
for ($i = 0; $i < count($users); $i++) {
    $tmpTotalTime = 0;
    $tmpTotalCalories = 0;

    for ($j = 0; $j < count($equipment_used); $j++) {
        $equipment = $equipment_used[$j];
        if ($equipment['User_ID'] == $users[$i]['ID']) {
            // Set total time and calories for current user
            $tmpTotalTime += $equipment['Time'];
            $tmpTotalCalories += $equipment['Calories'];

            // Add to total time and calories sorted on gender
            if ($users[$i]['Gender']) { // Men
                $totalTimeMen += $equipment['Time'];
                $totalCaloriesMen += $equipment['Calories'];
            } else { // Women
                $totalTimeWomen += $equipment['Time'];
                $totalCaloriesWomen += $equipment['Calories'];
            }
        }
    }

    // Skip no activitie records
    if ($tmpTotalTime <= 0 || $tmpTotalCalories <= 0) continue;

    if ($users[$i]['Gender']) { // Men
        $totalMen += 1;
    } else { // Women
        $totalWomen += 1;
    }

    // Calc age
    $tz  = new DateTimeZone('Europe/Brussels');
    $age = DateTime::createFromFormat('Y-m-d', $users[$i]['Birthdate'], $tz)
         ->diff(new DateTime('now', $tz))
         ->y;
    array_push($user_activities, array(
        'ID' => $users[$i]['ID'],
        'Gender' => $users[$i]['Gender'],
        'Age' => $age,
        'TotalTime' => $tmpTotalTime,
        'TotalCalories' => $tmpTotalCalories,
        'CaloriesPerMinute' => $tmpTotalCalories / $tmpTotalTime
    ));
}

// Calculate avarages for each gender
$avgTimeMen = $totalTimeMen / $totalMen;
$avgCaloriesMen = $totalCaloriesMen / $totalMen;
$avgTimeWomen = $totalTimeWomen / $totalWomen;
$avgCaloriesWomen = $totalCaloriesWomen / $totalWomen;

// START NEURALNETWORK
include_once("/Net.class.php");

$fileName = 'Advisor';

$net = new Net();
// $topology = [];
// array_push($topology, 4);
// array_push($topology, 3);
// array_push($topology, 3);
// $net->create($topology);
$net->import($fileName); // Load net

// srand(1337);
for ($i = 1; $i <= 1337; $i++) {
    $randomUser = $user_activities[Rand(0, count($user_activities) - 1)];
    // $randomUser = $user_activities[$i];
    $avgTime = $randomUser['Gender'] ? $avgTimeMen : $avgTimeWomen;
    $avgCalories = $randomUser['Gender'] ? $avgCaloriesMen : $avgCaloriesWomen;

    // Add input
    $inputVals = [];
    array_push($inputVals, $randomUser['Gender']);
    array_push($inputVals, $randomUser['Age']);
    array_push($inputVals, $randomUser['CaloriesPerMinute']);
    array_push($inputVals, $randomUser['TotalCalories']);
    $net->feedForward($inputVals);

    // Get results
    $results = $net->getResults();

    // backProp
    $targetVals = [];
    array_push($targetVals, ($avgTime <= $randomUser['TotalTime'] ? 1 : 0)); // 1 = Higher total time spend in gym
    array_push($targetVals, ($avgCalories <= $randomUser['TotalCalories'] ? 1 : 0)); // 1 = Higher total calories burned
    array_push($targetVals, ($avgCalories / $avgTime <= $randomUser['TotalCalories'] / $randomUser['TotalTime'] ? 1 : 0)); // 1 = Higher calories a minute
    $net->backProp($targetVals);

    echo "Pass: " . $i . " user: " . $randomUser['ID'] . " Input: ";
    for ($j = 0; $j < count($inputVals); $j++) {
        echo $inputVals[$j] . ", ";
    }
    echo "<br>";
    echo "Target: " . "<br>";

    for ($t = 0; $t < count($targetVals); $t++) {
        echo $targetVals[$t] . ", ";
    }
    echo "<br>";

    echo "Output: <br>";
    for ($o = 0; $o < count($results); $o++) {
        echo $results[$o] . " <br>";
    }
    echo "<br><br>";
}


// Export net to file
$net->export($fileName);
?>
