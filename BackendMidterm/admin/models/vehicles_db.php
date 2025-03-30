<?php
function get_all_vehicles($sort) {
    global $db;
    $query = 'SELECT v.vehicle_id, v.year, v.model, v.price, t.type_name, c.class_name, m.make_name 
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

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}
?>