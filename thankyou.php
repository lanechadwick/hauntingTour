<?php
    require('./model/database.php');
    $error_message = null;
    $vistorName = filter_input(INPUT_POST, 'custName');
    $vistorEmail = filter_input(INPUT_POST, 'custEmail');
    $vistorPhone = filter_input(INPUT_POST, 'custPhone');
    $vistorEmailButton = filter_input(INPUT_POST, 'mailMe');
    $vistorComment = filter_input(INPUT_POST, 'custExp');
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */
    
    // Validate inputs
    if  ($vistorName == null || $vistorEmail == null ||
        $vistorPhone == null ||  $vistorComment == null  ) {
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
        echo "Form Data Error: " . $error; 
        exit();
        } else {
            $dsn = 'mysql:host=localhost;dbname=hauntinginfo';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
//                $db = new PDO($dsn, $username, $password);
                $db = Database::getDB();

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
            if (!$error_message) {
                    $query = 'INSERT INTO visitor
                         (vistorName, vistorEmail, vistorPhone, vistorEmailButton, vistorComment)
                      VALUES
                         (:vistorName, :vistorEmail, :vistorPhone, :vistorEmailButton, :vistorComment)';
            $statement = $db->prepare($query);
            $statement->bindValue(':vistorName', $vistorName);
            $statement->bindValue(':vistorEmail', $vistorEmail);
            $statement->bindValue(':vistorPhone', $vistorPhone);
            $statement->bindValue(':vistorEmailButton', $vistorEmailButton);
            $statement->bindValue(':vistorComment', $vistorComment);
//            $statement->execute();
            $count = $statement->execute();
            
            $statement->closeCursor();
            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_phone . $visitor_email_button . $visitor_comment; */
            if ($count < 1) {
                $error_message = "We are experiencing technical difficulties, Please come back later." ;
            } else {
                $error_message = "Thank you, $vistorName, for contacting us! I will get back to you shortly.";
            }
         }

            // Add the product to the database  
        
}

?>

   
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
                 <li><a href="login.php">admin</a></li>
                   </ul>
                  </nav>
               </div>
          <h1>Contact Scary Places</h1><br>
         
      
          	 
      </header>
      <section>
         <h2><?php echo $error_message; ?></h2>
      </section>
      
      
      <aside>
      </aside>
      
   </article>   
 
   
   <footer>
           
      </nav>

   </footer>
   
</body>
</html>
