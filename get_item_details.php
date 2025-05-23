<?php
/**
 * get_item_details.php - Get detailed information about a specific item
 * 
 * This script retrieves full details for a single lost or found item
 * Parameters:
 * - id: Item ID (required)
 * 
 * Returns JSON object with item details
 */

// Include database connection
require_once 'db_connection.php';

// Set headers for JSON response
header('Content-Type: application/json');

// Check if item ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Item ID is required']);
    exit;
}

$itemId = $_GET['id'];

try {
    // Prepare and execute query
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->execute([$itemId]);
    
    // Fetch item
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$item) {
        http_response_code(404);
        echo json_encode(['error' => 'Item not found']);
        exit;
    }
    
    // Format the date
    if (isset($item['date'])) {
        $date = new DateTime($item['date']);
        $item['date'] = $date->format('M d, Y');
    }
    
    // Ensure image path is complete
    if (!empty($item['image'])) {
        $item['image'] = 'uploads/' . $item['image'];
    } else {
        $item['image'] = 'images/default-item.png';
    }
    
    // Return JSON response
    echo json_encode($item);
} catch (PDOException $e) {
    // Return error if database query fails
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>