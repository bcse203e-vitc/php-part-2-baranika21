<?php
// Current date and time
echo "Current Date & Time: " . date("d-m-Y H:i:s") . "<br>";

// User DOB
$dob = "1990-05-15"; // change this to input
$today = new DateTime();
$birthDate = new DateTime($dob);
$nextBirthday = new DateTime(date("Y") . "-" . $birthDate->format("m-d"));

if ($nextBirthday < $today) {
    $nextBirthday->modify("+1 year");
}

$daysLeft = $today->diff($nextBirthday)->days;
echo "Days left until next birthday: $daysLeft";
?>

