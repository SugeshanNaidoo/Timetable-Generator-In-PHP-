<?php

$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$timeSlots = ['8:00 AM - 9:00 AM', '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM', '11:00 AM - 12:00 PM', '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM', '3:00 PM - 4:00 PM'];

// Function to generate a random timetable
function generateTimetable($courses) {
    $timetable = [];

    foreach ($courses as $course) {
        $day = array_rand($GLOBALS['days']);
        $timeSlot = array_rand($GLOBALS['timeSlots']);

        // Check if the slot is already occupied
        while (isset($timetable[$day][$timeSlot])) {
            $day = array_rand($GLOBALS['days']);
            $timeSlot = array_rand($GLOBALS['timeSlots']);
        }

        $timetable[$day][$timeSlot] = $course;
    }

    return $timetable;
}

// Subjects/Courses
$courses = ['Math', 'Physics', 'English', 'History', 'Computer Science', 'Biology', 'Chemistry'];

// Generate timetable
$generatedTimetable = generateTimetable($courses);

// Display timetable
echo "<table border='1'>";
echo "<tr><th>Time Slot</th>";

foreach ($days as $day) {
    echo "<th>$day</th>";
}

echo "</tr>";

foreach ($timeSlots as $timeSlot) {
    echo "<tr><td>$timeSlot</td>";

    foreach ($days as $day) {
        echo "<td>";

        echo $generatedTimetable[$day][$timeSlot] ?? "&nbsp;";

        echo "</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>
