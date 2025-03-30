<?php
require_once('../../models/database.php');
require_once('../models/vehicles_db.php');

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
        include('vehicles_list.php');
        break;
    case 'delete_vehicle':
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        if ($vehicle_id) {
            delete_vehicle($vehicle_id);
            header('Location: .?action=list_vehicles');
        } else {
            $error = "Missing or incorrect vehicle id.";
            include('../views/error.php');
        }
        break;
    default:
        $vehicles = get_all_vehicles($sort);
        include('vehicles_list.php');
}
?>