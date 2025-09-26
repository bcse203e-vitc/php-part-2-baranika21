<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Path to log file (full path is safer)
$logFile = __DIR__ . "/access.log";

// Example data (can be dynamic from form later)
$username = "admin";
$action = "Logged In";
$timestamp = date("Y-m-d H:i:s");

// Make sure log file exists, if not create it
if (!file_exists($logFile)) {
    // Attempt to create the file
    if (!touch($logFile)) {
        die("Error: Cannot create log file. Check folder permissions.");
    }
    // Set write permission
    chmod($logFile, 0666);
}

// Create log entry
$entry = "$username - $timestamp - $action" . PHP_EOL;

// Append entry to file
if (file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX) === false) {
    die("Error: Could not write to log file. Check permissions.");
}

// Read all lines from log file
$logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Get only the last 5 entries
$lastLogs = array_slice($logs, -5);

// Display on webpage
echo "<h3>Last 5 Log Entries</h3><ul>";
foreach ($lastLogs as $log) {
    echo "<li>" . htmlspecialchars($log) . "</li>";
}
echo "</ul>";
?>

