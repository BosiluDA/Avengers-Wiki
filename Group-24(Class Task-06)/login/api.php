<?php
header("Content-Type: application/json");

// Path to the JSON file
$json_file = "data.json";

// Load JSON data
function load_data() {
    global $json_file;
    return json_decode(file_get_contents($json_file), true);
}

// Save JSON data
function save_data($data) {
    global $json_file;
    file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT));
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Return all records or a specific record by ID
    $data = load_data();
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $record = array_filter($data, fn($item) => $item['id'] === $id);
        echo json_encode(array_values($record));
    } else {
        echo json_encode($data);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add a new record
    $data = load_data();
    $new_record = json_decode(file_get_contents('php://input'), true);
    $new_record['id'] = end($data)['id'] + 1; // Assign a new ID
    $data[] = $new_record;
    save_data($data);
    echo json_encode(["message" => "Record added successfully"]);
}
?>
