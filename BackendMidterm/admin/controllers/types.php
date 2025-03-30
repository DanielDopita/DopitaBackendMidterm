<?php
require_once('../../models/database.php');
require_once('../models/types_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_types';
    }
}

switch ($action) {
    case 'list_types':
        $types = get_all_types();
        include('types_list.php');
        break;
    case 'add_type':
        $type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);
        if ($type_name) {
            add_type($type_name);
            header('Location: .?action=list_types');
        } else {
            $error = "Invalid type name.";
            include('../views/error.php');
        }
        break;
    case 'delete_type':
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        if ($type_id) {
            try {
                delete_type($type_id);
                header('Location: .?action=list_types');
            } catch (PDOException $e) {
                $error = "Cannot delete a type if vehicles exist in the type.";
                include('../views/error.php');
            }
        } else {
            $error = "Missing or incorrect type id.";
            include('../views/error.php');
        }
        break;
    default:
        $types = get_all_types();
        include('types_list.php');
}
?>