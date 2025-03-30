<?php
require_once(__DIR__ . '/config/paths.php');

echo "<h2>Path Configuration Test</h2>";
echo "<ul>";
echo "<li>ROOT_PATH: " . ROOT_PATH . "</li>";
echo "<li>MODELS_PATH: " . MODELS_PATH . "</li>";
echo "<li>ADMIN_PATH: " . ADMIN_PATH . "</li>";
echo "</ul>";

echo "<h3>File Existence Check</h3>";
echo "<ul>";
echo "<li>database.php: " . (file_exists(MODELS_PATH . '/database.php') ? "Exists" : "Missing") . "</li>";
echo "<li>vehicles_db.php: " . (file_exists(MODELS_PATH . '/vehicles_db.php') ? "Exists" : "Missing") . "</li>";
echo "</ul>";
?>