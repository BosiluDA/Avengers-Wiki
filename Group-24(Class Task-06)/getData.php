<?php
header('Content-Type: application/json');

require_once 'db_config.php';

$pdo = getDbConnection();

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

try {
    if ($id !== null) {
        $stmt = $pdo->prepare("SELECT id, name, real_name AS realName, status, team, abilities FROM characters WHERE id = ?");
        $stmt->execute([$id]);
        $records = $stmt->fetchAll();
        $response = !empty($records) ? $records : ["message" => "No record found with the given ID"];
    } else {
        $stmt = $pdo->query("SELECT id, name, real_name AS realName, status, team, abilities FROM characters ORDER BY id");
        $response = $stmt->fetchAll();
    }
    echo json_encode($response);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Error fetching data"]);
}
?>
