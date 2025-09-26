<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Example arrays
$validNumbers = [10, 20, 30, 40, 50];
$emptyNumbers = []; // Empty array

// Function to calculate average with error handling
function calculateAverage($numbers) {
    try {
        if (empty($numbers)) {
            throw new Exception("No numbers provided");
        }

        $sum = array_sum($numbers);
        $count = count($numbers);
        $average = $sum / $count;

        echo "Numbers: [" . implode(", ", $numbers) . "]<br>";
        echo "Average: $average<br><br>";

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br><br>";
    }
}

// Test with valid array
calculateAverage($validNumbers);

// Test with empty array
calculateAverage($emptyNumbers);
?>

