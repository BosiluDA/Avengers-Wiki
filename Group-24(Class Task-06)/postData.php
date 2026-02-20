<?php
header('Content-Type: application/json');

require_once 'db_config.php';

$input = file_get_contents('php://input');
if (!$input) {
    echo json_encode(["message" => "No input data received"]);
    exit;
}

$newRecord = json_decode($input, true);

if (!$newRecord || !isset($newRecord['name'], $newRecord['realName'], $newRecord['status'], $newRecord['team'], $newRecord['abilities'])) {
    echo json_encode(["message" => "Incomplete or invalid data"]);
    exit;
}

try {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("INSERT INTO characters (name, real_name, status, team, abilities) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        trim($newRecord['name']),
        trim($newRecord['realName']),
        trim($newRecord['status']),
        trim($newRecord['team']),
        trim($newRecord['abilities'])
    ]);
    echo json_encode(["message" => "Record added successfully"]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Error saving data"]);
}
?>
