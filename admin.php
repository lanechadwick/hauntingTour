<?php 
if (!isset($employee_id)) {
    $employee_id = filter_input(INPUT_GET, 'employee_id', 
            FILTER_VALIDATE_INT);
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id = 1;
    }
}


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

$query = 'SELECT  employeeID, fristName from employee ORDER BY employeeID';
$statement = $db->prepare($query);
$statement->execute();
//$statement->closeCursor();
$employees = $statement;

$query2 = 'SELECT * FROM visitor WHERE employeeID = :employeeID';
   // . 'ORDER BY vistorEmail';
$statement2 = $db->prepare($query2);
$statement2->bindValue(":employeeID", $employee_id);
$statement2->execute();
//$statement->closeCursor();
$visitors = $statement2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--
    7E
    New Perspectives on HTML5 and CSS3, 7th Edition
    Tutorial 4
    Tutorial Case
    
    Home Page of the Komatsu Family at Tree and Book
    Author: Lane Chadwick   
    Date:   08/20/19

    Filename: SP_Home.html
   -->
   
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, inital-scale=1" />
   <meta name="description" content="Welcome to your worst nightmare, come see if you dare!">
   <meta name="keywords" content="haunted, haunt, forest, halloween, schedule, September, October">
   <link rel="shortcut icon" type="image/png" href="images/s.jpg"/>
   <link href="css/SP_Visual1.css" rel="stylesheet"/>
   <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

   <title>Scary Places</title>      

</head>

<body>

   <article>
      <header>
        <div class="container">
            <nav>
                  <a id="navicon" href="#"><img src="images/navicon4.png" alt="navicon" /></a>
                   <ul>
                 <li><a href="SP_Home.html">Home</a></li>
                 <li><a href="SP_Tours.html">Tours</a></li>
                 <li><a href="SP_About.html">Feedback</a></li>
                 <li><a href="SP_Mission.html">Gallery</a></li>
                   </ul>
                  </nav>
               </div>		 
      </header>
      <!--Survey-->
    </article>
  
       
      
      
      <section>
        <!-- display a list of categories -->
        <h2>Employees</h2>
        <nav>
        <ul>
            <?php foreach ($employees as $employee) : ?>
            <li><a href="admin.php?employee_id=<?php echo $employee['employeeID']; ?>">
                    <?php echo $employee['fristName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>         
            </section>

            
            <table>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th class="right">Comment</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($visitors as $visitor) : ?>
            <tr>
                <td><?php echo $visitor['vistorName']; ?></td>
                <td><?php echo $visitor['vistorPhone']; ?></td>
                <td><?php echo $visitor['vistorEmail']; ?></td>
                <td class="right"><?php echo $visitor['vistorComment']; ?></td>
                <td><form action="delete_visitor.php" method="post">
                    <input type="hidden" name="visitor_id"
                           value="<?php echo $visitor['visitorID']; ?>">
                    <input type="hidden" name="employee_id"
                           value="<?php echo $visitor['employeeID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
      
   
 
   
   <footer>
           
      </nav>

   </footer>
   
</body>
</html>

