<?php

  $dsn = 'mysql:host=localhost;dbname=hauntinginfo';
  $username = 'root';
  $password = 'Pa$$w0rd';

  try {
    $db = new PDO($dsn, $username, $password);

} catch (PDOException $e) {
    $error_message = $e->getMessage();
    /* include('database_error.php'); */
    echo "DB Error: " . $error_message; 
    exit();
}

// Get IDs
$visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_VALIDATE_INT);
$employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($visitor_id != false && $employee_id != false) {
    $query = 'DELETE FROM visitor
              WHERE employeeID = :employee_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':employee_id', $employee_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Product List page
include('admin.php');