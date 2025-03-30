<?php
require_once('../../models/database.php');
require_once('../models/classes_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_classes';
    }
}

switch ($action) {
    case 'list_classes':
        $classes = get_all_classes();
        include('classes_list.php');
        break;
    case 'add_class':
        $class_name = filter_input(INPUT_POST, 'class_name', FILTER_UNSAFE_RAW);
        if ($class_name) {
            add_class($class_name);
            header('Location: .?action=list_classes');
        } else {
            $error = "Invalid class name.";
            include('../views/error.php');
        }
        break;
    case 'delete_class':
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        if ($class_id) {
            try {
                delete_class($class_id);
                header('Location: .?action=list_classes');
            } catch (PDOException $e) {
                $error = "Cannot delete a class if vehicles exist in the class.";
                include('../views/error.php');
            }
        } else {
            $error = "Missing or incorrect class id.";
            include('../views/error.php');
        }
        break;
    default:
        $classes = get_all_classes();
        include('classes_list.php');
}
?>