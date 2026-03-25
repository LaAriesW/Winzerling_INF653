<?php
require_once('database.php');

function get_classes()
{
    global $db;
    $query = 'SELECT * FROM classes ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function add_class($class_name)
{
    global $db;
    $query = 'INSERT INTO classes (Class) VALUES (:class_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_name', $class_name, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

function delete_class($class_id)
{
    global $db;
    try {
        $query = 'DELETE FROM classes WHERE ID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        throw new Exception("Cannot delete class");
    }

}

?>