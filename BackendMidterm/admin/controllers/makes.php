<?php
require_once('../../models/database.php');
require_once('../models/makes_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_makes';
    }
}

switch ($action) {
    case 'list_makes':
        $makes = get_all_makes();
        include('makes_list.php');
        break;
    case 'add_make':
        $make_name = filter_input(INPUT_POST, 'make_name', FILTER_UNSAFE_RAW);
        if ($make_name) {
            add_make($make_name);
            header('Location: .?action=list_makes');
        } else {
            $error = "Invalid make name.";
            include('../views/error.php');
        }
        break;
    case 'delete_make':
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        if ($make_id) {
            try {
                delete_make($make_id);
                header('Location: .?action=list_makes');
            } catch (PDOException $e) {
                $error = "Cannot delete a make if vehicles exist in the make.";
                include('../views/error.php');
            }
        } else {
            $error = "Missing or incorrect make id.";
            include('../views/error.php');
        }
        break;
    default:
        $makes = get_all_makes();
        include('makes_list.php');
}
?>