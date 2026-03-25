<?php
require_once('model/database.php');
require_once('model/classes_db.php');
require_once('model/makes_db.php');
require_once('model/types_db.php');
require_once('model/vehicles_db.php');

$vehicle_year = filter_input(INPUT_POST, 'vehicle_year', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'vehicle_year', FILTER_VALIDATE_INT);

$vehicle_model = filter_input(INPUT_POST, 'vehicle_model', FILTER_SANITIZE_SPECIAL_CHARS)
    ?: filter_input(INPUT_GET, 'vehicle_model', FILTER_SANITIZE_SPECIAL_CHARS);

$vehicle_price = filter_input(INPUT_POST, 'vehicle_price', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'vehicle_price', FILTER_VALIDATE_INT);

$vehicle_type_id = filter_input(INPUT_POST, 'vehicle_type_id', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'vehicle_type_id', FILTER_VALIDATE_INT);

$vehicle_class_id = filter_input(INPUT_POST, 'vehicle_class_id', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'vehicle_class_id', FILTER_VALIDATE_INT);

$vehicle_make_id = filter_input(INPUT_POST, 'vehicle_make_id', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'vehicle_make_id', FILTER_VALIDATE_INT);

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_SPECIAL_CHARS);

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);

$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_SPECIAL_CHARS);

$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_SPECIAL_CHARS);

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT)
    ?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW)
    ?: filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW)
    ?: 'list_vehicles';

switch ($action) {
    case 'list_vehicles':
        $vehicles = get_vehicles();
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        include('view/vehicles_list.php');
        break;
    case 'add_vehicle':
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        if (!empty($vehicle_year) && !empty($vehicle_model) && !empty($vehicle_price) && !empty($vehicle_type_id) && !empty($vehicle_class_id) && !empty($vehicle_make_id)) {
            add_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_type_id, $vehicle_class_id, $vehicle_make_id);
            header('Location: .?action=list_vehicles');
            exit();
        }
        break;
    case 'delete_vehicle':
        if (!empty($vehicle_year) && !empty($vehicle_model) && !empty($vehicle_price) && !empty($vehicle_type_id) && !empty($vehicle_class_id) && !empty($vehicle_make_id)) {
            delete_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_type_id, $vehicle_class_id, $vehicle_make_id);
            header('Location: .?action=list_vehicles');
            exit();
        }
        break;

    case 'list_admin_vehicles':
        $vehicles = get_vehicles();
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        include('admin/vehicles_admin.php');
        break;

    case 'add_admin_vehicle':
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        if (!empty($vehicle_year) && !empty($vehicle_model) && !empty($vehicle_price) && !empty($vehicle_type_id) && !empty($vehicle_class_id) && !empty($vehicle_make_id)) {
            add_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_type_id, $vehicle_class_id, $vehicle_make_id);
            header('Location: .?action=list_admin_vehicles');
            exit();
        }
        break;

    case 'delete_admin_vehicle':
        if (!empty($vehicle_year) && !empty($vehicle_model) && !empty($vehicle_price) && !empty($vehicle_type_id) && !empty($vehicle_class_id) && !empty($vehicle_make_id)) {
            delete_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_type_id, $vehicle_class_id, $vehicle_make_id);
            header('Location: .?action=list_admin_vehicles');
            exit();
        }
        break;

    case 'list_classes':
        $classes = get_classes();
        include('view/classes_list.php');
        break;

    case 'add_class':
        if (!empty($class_name)) {
            add_class($class_name);
            header('Location: .?action=list_classes');
            exit();
        }
        break;
    case 'delete_class':
        if ($class_id) {

            delete_class($class_id);
            header('Location: .?action=list_classes');
            exit();

        }
        break;
    case 'list_makes':
        $makes = get_makes();
        include('view/makes_list.php');
        break;

    case 'add_make':
        if (!empty($make_name)) {
            add_make($make_name);
            header('Location: .?action=list_makes');
            exit();
        }
        break;

    case 'delete_make':
        if ($make_id) {
            delete_make($make_id);
            header('Location: .?action=list_makes');
            exit();

        }
        break;

    case 'list_types':
        $types = get_types();
        include('view/types_list.php');
        break;

    case 'add_type':
        if (!empty($type_name)) {
            add_type($type_name);
            header('Location: .?action=list_types');
            exit();
        }
        break;
    case 'delete_type':
        if ($type_id) {
            delete_type($type_id);
            header('Location: .?action=list_types');
            exit();

        }
        break;
}