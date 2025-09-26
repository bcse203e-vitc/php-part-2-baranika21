<?php
$students = [
    "Rahul" => 85,
    "Priya" => 92,
    "Arun" => 78,
    "Sneha" => 95,
    "Vijay" => 88
];

// Sort by marks in descending order
arsort($students);

echo "<h3>Top 3 Students</h3>";
echo "<table border='1' cellpadding='5'>
<tr><th>Name</th><th>Marks</th></tr>";

$count = 0;
foreach ($students as $name => $marks) {
    if ($count == 3) break;
    echo "<tr><td>$name</td><td>$marks</td></tr>";
    $count++;
}
echo "</table>";
?>

