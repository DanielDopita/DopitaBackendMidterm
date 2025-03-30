<?php
// Load path configuration first
require_once(__DIR__ . '/../config/paths.php');

// Load models
require_once(MODELS_PATH . '/database.php');
require_once(MODELS_PATH . '/vehicles_db.php');
require_once(MODELS_PATH . '/makes_db.php');
require_once(MODELS_PATH . '/types_db.php');
require_once(MODELS_PATH . '/classes_db.php');

// Initialize variables with default values
$vehicles = [];
$makes = [];
$types = [];
$classes = [];

// Process input and get data
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) 
          ?? filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) 
          ?? 'list_vehicles';

$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_GET, 'sort', FILTER_UNSAFE_RAW);

// Get reference data
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

// Process actions
switch ($action) {
    case 'list_makes':
        $vehicles = $make_id ? get_vehicles_by_make($make_id, $sort) : get_all_vehicles($sort);
        break;
    case 'list_types':
        $vehicles = $type_id ? get_vehicles_by_type($type_id, $sort) : get_all_vehicles($sort);
        break;
    case 'list_classes':
        $vehicles = $class_id ? get_vehicles_by_class($class_id, $sort) : get_all_vehicles($sort);
        break;
    default:
        $vehicles = get_all_vehicles($sort);
}

// Include the view using absolute path
require_once(VIEWS_PATH . '/home.php');
?>