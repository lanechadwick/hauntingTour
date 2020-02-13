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
                 <li><a href="login.php">admin</a></li>
                   </ul>
                  </nav>
               </div>		 
      </header>
      <!--Survey-->
      <section>
        <h1>Login</h1>
        <form id="survey" action="admin.php" method="post">
           <fieldset id="custInfo">
              <legend>Please enter your credentials</legend>
              <div class="formRow">
              <label for ="name">Name*</label>
              <input name="name" id="custName" type="text" placeholder="First Name" required />
              </div>
  
  
              <div class="formRow">
              <label for ="password">Password*</label>
              <input name="password" id="password" type="password" required />
              </div>
           </fieldset>
           
           <div id="buttons">
              <input type="submit" value="login" />
              <input type="reset" value="Cancel" />
           </div>
           <!--End of Survey-->
  
        </form>
  
       
     </section>
      
      
      <aside>
      </aside>
      
   </article>   
 
   
   <footer>
           
      </nav>

   </footer>
   
</body>
</html>