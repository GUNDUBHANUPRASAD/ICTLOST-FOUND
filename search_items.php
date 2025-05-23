<?php
/**
 * search_items.php - Search functionality for Lost & Found items
 * 
 * This script handles AJAX search requests for lost and found items
 * Parameters:
 * - query: Search term (optional)
 * - category: Filter by category (optional)
 * - status: Filter by status (lost/found/claimed) (optional)
 * - date: Filter by date (optional)
 * 
 * Returns JSON array of matching items
 */

// Include database connection
require_once 'db_connection.php';

// Set headers for JSON response
header('Content-Type: application/json');

// Initialize SQL query
$sql = "SELECT * FROM items WHERE 1=1";
$params = array();

// Process search parameters
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchTerm = '%' . $_GET['query'] . '%';
    $sql .= " AND (item_name LIKE ? OR description LIKE ? OR location LIKE ?)";
    $params[] = $searchTerm;
    $params[] = $searchTerm;
    $params[] = $searchTerm;
}

// Filter by category
if (isset($_GET['category']) && !empty($_GET['category'])) {
    $sql .= " AND category = ?";
    $params[] = $_GET['category'];
}

// Filter by status
if (isset($_GET['status']) && !empty($_GET['status'])) {
    $sql .= " AND status = ?";
    $params[] = $_GET['status'];
}

// Filter by date
if (isset($_GET['date']) && !empty($_GET['date'])) {
    $sql .= " AND DATE(date) = ?";
    $params[] = $_GET['date'];
}

// Order by most recent first
$sql .= " ORDER BY date DESC";

try {
    // Prepare and execute query
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    
    // Fetch all matching items
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Process image paths and format data
    foreach ($items as &$item) {
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
    }
    
    // Return JSON response
    echo json_encode($items);
} catch (PDOException $e) {
    // Return error if database query fails
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>