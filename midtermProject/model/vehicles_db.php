<?php
require_once('database.php');

function get_vehicles()
{
    global $db;
    $query = 'SELECT v.year, v.model, v.price,
        m.Make, t.Type, c.Class, v.type_id, v.class_id, v.make_id
    FROM vehicles v 
    JOIN makes m on v.make_id = m.ID
    JOIN types t on v.type_id = t.ID
    JOIN classes c on v.class_id = c.ID
    ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function add_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_type_id, $vehicle_class_id, $vehicle_make_id)
{
    global $db;
    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (:vehicle_year, :vehicle_model, :vehicle_price, :vehicle_type_id, :vehicle_class_id, :vehicle_make_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_year', $vehicle_year, PDO::PARAM_INT);
    $statement->bindValue(':vehicle_model', $vehicle_model, PDO::PARAM_STR);
    $statement->bindValue(':vehicle_price', $vehicle_price, PDO::PARAM_INT);
    $statement->bindValue(':vehicle_type_id', $vehicle_type_id, PDO::PARAM_INT);
    $statement->bindValue(':vehicle_class_id', $vehicle_class_id, PDO::PARAM_INT);
    $statement->bindValue(':vehicle_make_id', $vehicle_make_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_type_id, $vehicle_class_id, $vehicle_make_id)
{
    global $db;
    try {
        $query = 'DELETE FROM vehicles WHERE year = :vehicle_year AND model = :vehicle_model AND price = :vehicle_price AND type_id = :vehicle_type_id AND class_id = :vehicle_class_id AND make_id = :vehicle_make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_year', $vehicle_year, PDO::PARAM_INT);
        $statement->bindValue(':vehicle_model', $vehicle_model, PDO::PARAM_STR);
        $statement->bindValue(':vehicle_price', $vehicle_price, PDO::PARAM_INT);
        $statement->bindValue(':vehicle_type_id', $vehicle_type_id, PDO::PARAM_INT);
        $statement->bindValue(':vehicle_class_id', $vehicle_class_id, PDO::PARAM_INT);
        $statement->bindValue(':vehicle_make_id', $vehicle_make_id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception("Cannot delete Vehicle");
    }

}