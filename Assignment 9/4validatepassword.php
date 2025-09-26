<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Array of passwords to check
$passwords = ["Test123@", "test123", "TEST@abc", "MyPass1#", "weakpass"];

// Function to print validation result
function printResult($condition, $flag) {
    echo $condition . ": " . ($flag ? "<span style='color:green'>Valid ✅</span>" : "<span style='color:red'>Invalid ❌</span>") . "<br>";
}

// Loop through each password
foreach ($passwords as $password) {
    echo "<hr>"; // separator
    echo "<h3>Password Validation for: '$password'</h3>";

    // Check each condition
    $lengthValid = strlen($password) >= 8;
    $uppercaseValid = preg_match('/[A-Z]/', $password);
    $digitValid = preg_match('/\d/', $password);
    $specialCharValid = preg_match('/[@#$%]/', $password);

    printResult("Minimum 8 characters", $lengthValid);
    printResult("At least one uppercase letter", $uppercaseValid);
    printResult("At least one digit", $digitValid);
    printResult("At least one special character (@, #, $, %)", $specialCharValid);

    // Overall validity
    if ($lengthValid && $uppercaseValid && $digitValid && $specialCharValid) {
        echo "<br><strong>Overall: Password is valid ✅</strong>";
    } else {
        echo "<br><strong>Overall: Password is invalid ❌</strong>";
    }
}
?>

