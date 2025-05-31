<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

include 'db_connect.php';

$conn = getConnection();

if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Fetch all exercise sessions
$query = "SELECT angles FROM exercise_data";
$result = $conn->query($query);

$allAngles = [];
$sessionAverages = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $anglesData = json_decode($row['angles'], true); 
        if (is_array($anglesData) && isset($anglesData['angles']) && is_array($anglesData['angles'])) {
            $angles = $anglesData['angles'];
            if (!empty($angles)) {
                $allAngles = array_merge($allAngles, array_map('floatval', $angles)); 
                $sessionAverage = array_sum($angles) / count($angles);
                $sessionAverages[] = $sessionAverage;
            }
        }
    }
}

error_log("allAngles: " . var_export($allAngles, true));

$totalSessions = $result->num_rows;

$averageAngle = !empty($allAngles) ? array_sum($allAngles) / count($allAngles) : 0.0;
$maxAngle = !empty($allAngles) ? (float)max($allAngles) : 0.0;
$minAngle = !empty($allAngles) ? (float)min($allAngles) : 0.0;

$successCount = 0;
foreach ($allAngles as $angle) {
    if ($angle >= 70 && $angle <= 110) {
        $successCount++;
    }
}
$successRate = !empty($allAngles) ? ($successCount / count($allAngles)) * 100 : 0.0;

$response = [
    'average_angle' => $averageAngle,
    'max_angle' => $maxAngle,
    'min_angle' => $minAngle,
    'success_rate' => $successRate,
    'total_sessions' => $totalSessions,
    'sessions' => $sessionAverages
];

echo json_encode($response);

$conn->close();
?>