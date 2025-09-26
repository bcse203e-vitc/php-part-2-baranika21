<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// File paths
$inputFile = __DIR__ . "/10students.txt";
$errorFile = __DIR__ . "/errors.log";

// Check if input file exists
if (!file_exists($inputFile)) {
    die("Error: students.txt not found.");
}

// Clear previous errors log
file_put_contents($errorFile, "");

// Read all lines from students.txt
$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Function to validate email using regex
function isValidEmail($email) {
    return preg_match('/^[\w\.-]+@[\w\.-]+\.\w+$/', $email);
}

// Function to calculate age from DOB
function calculateAge($dob) {
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    return $age;
}

// Array to store valid records
$validRecords = [];

// Process each line
foreach ($lines as $line) {
    $parts = explode(",", $line);

    // Check if all 3 fields are present
    if (count($parts) != 3) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }

    list($name, $email, $dob) = $parts;

    // Trim whitespace
    $name = trim($name);
    $email = trim($email);
    $dob = trim($dob);

    // Validate email
    if (!isValidEmail($email)) {
        file_put_contents($errorFile, $line . PHP_EOL, FILE_APPEND);
        continue;
    }

    // Calculate age
    $age = calculateAge($dob);

    // Add valid record
    $validRecords[] = ['name' => $name, 'email' => $email, 'age' => $age];
}

// Display valid records in a table
if (!empty($validRecords)) {
    echo "<h3>Valid Student Records</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";
    foreach ($validRecords as $student) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($student['name']) . "</td>";
        echo "<td>" . htmlspecialchars($student['email']) . "</td>";
        echo "<td>" . $student['age'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No valid student records found.";
}

// Show where invalid records are saved
echo "<br><br>Invalid records (if any) are saved in errors.log";
?>

