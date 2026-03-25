<?php
require_once('database.php');

function get_types()
{
    global $db;
    $query = 'SELECT * FROM types ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function add_type($type_name)
{
    global $db;
    $query = 'INSERT INTO types (Type) VALUES (:type_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_name', $type_name, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($type_id)
{
    global $db;
    try {
        $query = 'DELETE FROM types WHERE ID = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception("Cannot delete type");
    }

}

?>