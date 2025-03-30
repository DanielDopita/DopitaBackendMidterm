<?php
// Load paths relative to project root
require_once(__DIR__ . '/../../config/paths.php');

// Now use the constants
require_once(MODELS_PATH . '/database.php');
require_once(MODELS_PATH . '/vehicles_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_vehicles';
    }
}

$sort = filter_input(INPUT_GET, 'sort', FILTER_UNSAFE_RAW);

switch ($action) {
    case 'list_vehicles':
        $vehicles = get_all_vehicles($sort);
        include(ADMIN_VIEWS_PATH . '/vehicles_list.php');
        break;
    case 'delete_vehicle':
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        if ($vehicle_id) {
            delete_vehicle($vehicle_id);
            header('Location: .?action=list_vehicles');
        } else {
            $error = "Missing or incorrect vehicle id.";
            include(ADMIN_VIEWS_PATH . '/error.php');
        }
        break;
    default:
        $vehicles = get_all_vehicles($sort);
        include(ADMIN_VIEWS_PATH . '/vehicles_list.php');
}
?>