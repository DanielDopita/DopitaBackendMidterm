<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/vehicles_db.php');
require_once(__DIR__ . '/../models/makes_db.php');
require_once(__DIR__ . '/../models/types_db.php');
require_once(__DIR__ . '/../models/classes_db.php');

// Initialize variables with default values
$vehicles = [];
$makes = [];
$types = [];
$classes = [];

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_vehicles';
    }
}

$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_GET, 'sort', FILTER_UNSAFE_RAW);

// Always get these lists regardless of action
$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

switch ($action) {
    case 'list_vehicles':
        $vehicles = get_all_vehicles($sort);
        break;
    case 'list_makes':
        if ($make_id) {
            $vehicles = get_vehicles_by_make($make_id, $sort);
        } else {
            $vehicles = get_all_vehicles($sort);
        }
        break;
    case 'list_types':
        if ($type_id) {
            $vehicles = get_vehicles_by_type($type_id, $sort);
        } else {
            $vehicles = get_all_vehicles($sort);
        }
        break;
    case 'list_classes':
        if ($class_id) {
            $vehicles = get_vehicles_by_class($class_id, $sort);
        } else {
            $vehicles = get_all_vehicles($sort);
        }
        break;
    default:
        $vehicles = get_all_vehicles($sort);
}

// Include the view after all processing is done
include(__DIR__ . '../views/home.php');
?>