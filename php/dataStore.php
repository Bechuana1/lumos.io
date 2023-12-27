<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
    $comments = isset($_POST['comments']) ? $_POST['comments'] : '';
    $time = date("Y-m-d H:i:s");

    // Create an array with the form data
    $formData = [
        'title' => $title,
        'tags' => $tags,
        'comments' => $comments,
        'time' => $time,
    ];

    // Append the array to the data file
    $dataFile = 'data.txt';
    $existingData = [];

    if (file_exists($dataFile)) {
        // Load existing data
        $existingData = json_decode(file_get_contents($dataFile), true);
    }

    // Add new form data
    $existingData[] = $formData;

    // Save data to the file
    file_put_contents($dataFile, json_encode($existingData));

    // Redirect back to the form
    header('Location: ../readEntries.html');

    exit;
}
?>
