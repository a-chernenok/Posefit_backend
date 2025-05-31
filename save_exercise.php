<?php
header('Content-Type: application/json');
include 'db_connect.php'; 

$conn = getConnection();
if (!$conn) {
    echo json_encode(["success" => false, "error" => "Database connection failed"]);
    exit;
}

$session_id = uniqid();
$angles = json_decode(file_get_contents('php://input'), true); 

if ($angles) {
    $angles_json = json_encode($angles);
    if ($angles_json === false) {
        echo json_encode(["success" => false, "error" => "Failed to encode angles"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO exercise_data (session_id, angles) VALUES (?, ?)");
    if (!$stmt) {
        echo json_encode(["success" => false, "error" => "Failed to prepare statement"]);
        exit;
    }

    $stmt->bind_param("ss", $session_id, $angles_json);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "session_id" => $session_id]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to save"]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "No data received"]);
}

$conn->close();
?>