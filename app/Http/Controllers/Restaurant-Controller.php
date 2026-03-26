<?php
ob_start();

if (isset($_POST["name"], $_POST["phone"], $_POST["date"], $_POST["time"], $_POST["guests"], $_POST["notes"])) {
    $servername = "127.0.0.1";
    $username   = "Cirleano";
    $password   = "parola1234";
    $dbname     = "restaurant_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "DEBUG - Received date value: '" . $_POST["date"] . "'<br>";
    $date_input = trim($_POST["date"]);
    if (empty($date_input)) {
        die("Date field is empty.");
    }

    try {
        $date = new DateTime($date_input);
        $formatted_date = $date->format('Y-m-d');
        echo "DEBUG - Formatted date: '" . $formatted_date . "'<br>";
    } catch (Exception $e) {
        die("Invalid date format submitted. Received: '" . $date_input . "' Error: " . $e->getMessage());
    }

        echo "DEBUG - Received time value: '" . $_POST["time"] . "'<br>";
    $time_input = trim($_POST["time"]);
    if (empty($time_input)) {
        die("Time field is empty.");
    }

    try {
        $time = new DateTime($time_input);
        $formatted_time = $time->format('H:i:s');
        echo "DEBUG - Formatted time: '" . $formatted_time . "'<br>";
    } catch (Exception $e) {
        die("Invalid time format submitted. Received: '" . $time_input . "' Error: " . $e->getMessage());
    }


    $guests = intval($_POST["guests"]);
    echo "DEBUG - guests: " . $guests . "<br>";

    $stmt = $conn->prepare("
    INSERT INTO `tabela_restaurant` (name, phone, date, time, guests, notes)
    VALUES (?, ?, ?, ?, ?, ?)
    ");
    if (!$stmt) {
        die("SQL Preparation Failed: " . $conn->error);
    }

    $stmt->bind_param("sssiss", $_POST["name"], $_POST["phone"], $formatted_date, $formatted_time, $_POST["guests"], $_POST["notes"]);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: Restaurant-Validation.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
