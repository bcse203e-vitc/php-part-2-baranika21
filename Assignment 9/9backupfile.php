<?php
$originalFile = "data.txt";

if (file_exists($originalFile)) {
    $dateTime = date("Y-m-d_H-i");
    $backupFile = pathinfo($originalFile, PATHINFO_FILENAME) . "_$dateTime.txt";
    copy($originalFile, $backupFile);
    echo "Backup created: $backupFile";
} else {
    echo "File not found!";
}
?>

