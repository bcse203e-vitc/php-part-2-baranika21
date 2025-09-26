<?php
$emails = ["john@example.com", "wrong-email@", "me@site", "user123@gmail.com"];

echo "<h3>Valid Emails</h3>";
foreach ($emails as $email) {
    if (preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
        echo "$email <br>";
    }
}
?>

