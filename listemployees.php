<?php 
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=hauntinginfo';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}

class Employee {

    private $id;
    private $frist_name;
    private $last_name;

    public function __construct($id, $frist_name, $last_name) {
        $this->id = $id;
        $this->frist_name = $frist_name;
        $this->last_name = $last_name;
    }

    public function getID() {
        return $this->id;
    }
    public function setID($value) {
        $this->id = $value;
    }
    public function getFristName() {
        return $this->frist_name;
    }
    public function setFristName($value) {
        $this->frist_name = $value;
    }
    public function getLastName() {
        return $this->last_name;
    }
    public function setLastName($value) {
        $this->last_name = $value;
    }
}

class EmployeeDB {

    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY lastName';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                                     $row['fristName'],
                                     $row['lastName']);
            $employees[] = $employee;
        }
        return $employees;
    }
}
$employees = EmployeeDB::getEmployees();
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
    
      
</article>

    <ul>
        <?php foreach($employees as $employee): ?>
            <li>
                <?php echo $employee->getLastName() . ', ' . $employee->getFristName() ;?>
        </li>
        <?php endforeach; ?>
        </ul>
   
   <footer>
           
      </nav>

   </footer>
   
</body>
</html>