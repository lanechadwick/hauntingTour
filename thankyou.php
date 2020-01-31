<?php
    
    $vistorName = filter_input(INPUT_POST, 'custName');
    $vistorEmail = filter_input(INPUT_POST, 'custEmail');
    $vistorPhone = filter_input(INPUT_POST, 'custPhone');
    $vistorEmailButton = filter_input(INPUT_POST, 'mailMe');
    $vistorComment = filter_input(INPUT_POST, 'custExp');
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */
    
    // Validate inputs
    if  ($vistorName == null || $vistorEmail == null ||
        $vistorPhone == null ||  $vistorComment == null) {
        $error = "Invalid input data. Check all fields and try again.";
        /* include('error.php'); */
        echo "Form Data Error: " . $error; 
        exit();
        } else {
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

            // Add the product to the database  
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
            $statement->execute();
            $statement->closeCursor();
            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_phone . $visitor_email_button . $visitor_comment; */

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
                   </ul>
                  </nav>
               </div>
         <h1>Contact Scary Places</h1>		 
      </header>
      <section>
          <h2>Thank you, <?php echo$vistorName; ?>, for contacting us! I will get back to yo shortly.</h2>
      </section>
      
      
      <aside>
      </aside>
      
   </article>   
 
   
   <footer>
           
      </nav>

   </footer>
   
</body>
</html>
