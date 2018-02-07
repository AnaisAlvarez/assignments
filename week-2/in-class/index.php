<?php
$days_of_the_week = [
    'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
];
$day_num = array_rand($days_of_the_week);
$favorite_day = $days_of_the_week[$day_num];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LIS 467 — Assignments</title>
</head>
<body>
<header>
    <h1>LIS 467 PHP Page</h1>
</header>
<main>
    <p>My favorite day is <?= $favorite_day; ?></p>.
</main>
</body>
</html>