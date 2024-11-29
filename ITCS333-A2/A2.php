<!DOCTYPE html>
<html>
<head>
    <title>UOB Student Nationality Data</title>
    <link rel="stylesheet" href="pico.min.css">
    <style>
        body {
            background-color: #F5F5F5;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }
        th {
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #F5F5F5;
        }
    </style>
</head>
<body>

<?php
$apiUrl = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Function to retrieve data
function Retrieve($url) {
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// Retrieve data
$data = Retrieve($apiUrl);

// Check retrieving data
if ($data) {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Year</th><th>Semester</th><th>The Program</th><th>Nationality</th><th>College</th><th>Number of Students</th></tr></thead>";

    // Table structure
    foreach ($data['results'] as $studentData) {
        echo "<tr>";
        echo "<td>" . $studentData['year'] . "</td>";
        echo "<td>" . $studentData['semester'] . "</td>";
        echo "<td>" . $studentData['the_programs'] . "</td>";
        echo "<td>" . $studentData['nationality'] . "</td>";
        echo "<td>" . $studentData['colleges'] . "</td>";
        echo "<td>" . $studentData['number_of_students'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error fetching data.";
}

?>

</body>
</html>