<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Input and output files
$inputFile = __DIR__ . "/8data.txt";
$outputFile = __DIR__ . "/8numbers.txt";

// Check if input file exists
if (!file_exists($inputFile)) {
    die("Error: Input file data.txt does not exist.");
}

// Read the content of data.txt
$text = file_get_contents($inputFile);

// Regular expression to match 10-digit numbers starting with 6-9
// (common pattern for Indian mobile numbers)
preg_match_all('/\b[6-9]\d{9}\b/', $text, $matches);

// $matches[0] contains all matched numbers
$numbers = $matches[0];

// Write the numbers into numbers.txt, one per line
if (!empty($numbers)) {
    file_put_contents($outputFile, implode(PHP_EOL, $numbers));
    echo "Extracted " . count($numbers) . " numbers and saved to numbers.txt<br>";
    echo "<strong>Numbers:</strong><br>";
    echo "<ul>";
    foreach ($numbers as $num) {
        echo "<li>$num</li>";
    }
    echo "</ul>";
} else {
    echo "No valid 10-digit mobile numbers found in data.txt.";
}
?>

