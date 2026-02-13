<?php
header('Content-Type: application/json');

// Database configuration
$config = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'university_db'
];

try {
    // Create connection
    $conn = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception('Connection failed: ' . $conn->connect_error);
    }
    
    // Get the SQL query from request
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['sql'])) {
        throw new Exception('No SQL query provided');
    }
    
    $sql = $input['sql'];
    
    // Execute the query
    $result = $conn->query($sql);
    
    if ($result === false) {
        throw new Exception('Query error: ' . $conn->error);
    }
    
    // Check if it's a SELECT query
    if ($result instanceof mysqli_result) {
        // Fetch all results
        $rows = [];
        $columns = [];
        
        // Get column names
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            $columns[] = $field->name;
        }
        
        // Get rows
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        echo json_encode([
            'success' => true,
            'results' => $rows,
            'columns' => $columns,
            'rowCount' => count($rows)
        ]);
    } else {
        // For INSERT, UPDATE, DELETE queries
        echo json_encode([
            'success' => true,
            'results' => [],
            'columns' => [],
            'rowCount' => $conn->affected_rows,
            'message' => 'Query executed successfully. ' . $conn->affected_rows . ' row(s) affected.'
        ]);
    }
    
    $conn->close();
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
