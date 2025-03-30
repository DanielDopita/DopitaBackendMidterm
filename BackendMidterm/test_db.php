<?php
// Adjust these paths according to your actual file structure
require_once(__DIR__.'/models/database.php');
require_once(__DIR__.'/models/makes_db.php');
require_once(__DIR__.'/models/types_db.php');
require_once(__DIR__.'/models/classes_db.php');
require_once(__DIR__.'/models/vehicles_db.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Testing Database Functions</h2>";

// Test makes table
echo "<h3>Testing get_all_makes()</h3>";
try {
    $makes = get_all_makes();
    echo "<pre>" . print_r($makes, true) . "</pre>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Add similar tests for other functions...
?>