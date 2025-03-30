<?php
// Check if PDO is available
if (!extension_loaded('pdo')) {
    die('PDO extension is not loaded. Please enable it in your php.ini file.');
}

$host = 'localhost';
$dbname = 'zippyusedautos';
$username = 'root';
$password = '';

try {
    // Create connection
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set error mode using string constant if needed
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Test connection
    $db->query('SELECT 1');
    
} catch (PDOException $e) {
    // More detailed error message
    $error_message = "Database connection failed: " . $e->getMessage();
    
    // Check for common issues
    if (strpos($e->getMessage(), 'could not find driver') !== false) {
        $error_message .= "<br><br>PDO MySQL driver is missing. Please install it.";
    }
    
    include('../views/database_error.php');
    exit();
}
?>