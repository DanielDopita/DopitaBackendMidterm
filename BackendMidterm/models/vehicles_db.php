<?php
function get_all_vehicles($sort) {
    global $db;
    $query = 'SELECT v.year, v.model, v.price, t.type_name, c.class_name, m.make_name 
              FROM vehicles v
              LEFT JOIN types t ON v.type_id = t.type_id
              LEFT JOIN classes c ON v.class_id = c.class_id
              LEFT JOIN makes m ON v.make_id = m.make_id';
    
    if ($sort == 'year') {
        $query .= ' ORDER BY v.year DESC';
    } else {
        $query .= ' ORDER BY v.price DESC';
    }
    
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make($make_id, $sort) {
    global $db;
    $query = 'SELECT v.year, v.model, v.price, t.type_name, c.class_name, m.make_name 
              FROM vehicles v
              LEFT JOIN types t ON v.type_id = t.type_id
              LEFT JOIN classes c ON v.class_id = c.class_id
              LEFT JOIN makes m ON v.make_id = m.make_id
              WHERE v.make_id = :make_id';
    
    if ($sort == 'year') {
        $query .= ' ORDER BY v.year DESC';
    } else {
        $query .= ' ORDER BY v.price DESC';
    }
    
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

// Similar functions for types and classes
function get_vehicles_by_type($type_id, $sort) {
    global $db;
    $query = 'SELECT v.year, v.model, v.price, t.type_name, c.class_name, m.make_name 
              FROM vehicles v
              LEFT JOIN types t ON v.type_id = t.type_id
              LEFT JOIN classes c ON v.class_id = c.class_id
              LEFT JOIN makes m ON v.make_id = m.make_id
              WHERE v.type_id = :type_id';
    
    if ($sort == 'year') {
        $query .= ' ORDER BY v.year DESC';
    } else {
        $query .= ' ORDER BY v.price DESC';
    }
    
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class($class_id, $sort) {
    global $db;
    $query = 'SELECT v.year, v.model, v.price, t.type_name, c.class_name, m.make_name 
              FROM vehicles v
              LEFT JOIN types t ON v.type_id = t.type_id
              LEFT JOIN classes c ON v.class_id = c.class_id
              LEFT JOIN makes m ON v.make_id = m.make_id
              WHERE v.class_id = :class_id';
    
    if ($sort == 'year') {
        $query .= ' ORDER BY v.year DESC';
    } else {
        $query .= ' ORDER BY v.price DESC';
    }
    
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
?>