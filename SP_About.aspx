<%@ Page Language="C#" %>
<%@ Import Namespace="System.Data.SqlClient" %>


<script runat="server">
    protected void submitButton_Click(object sender, EventArgs e)
    {
        if (Page.IsValid)
        {
            // Code that uses the data entered by the user
            // Define data objects
            SqlConnection conn;
            SqlCommand comm;
            // Read the connection string from Web.config
            string connectionString =
                ConfigurationManager.ConnectionStrings[
                "haunting"].ConnectionString;
            // Initialize connection
            conn = new SqlConnection(connectionString);
            // Create command 
            comm = new SqlCommand("EXEC InsertVisitor @nameTextBox,@phoneTextBox,@emailTextBox, @cb, @msgTextBox", conn);
            comm.Parameters.Add("@nameTextBox", System.Data.SqlDbType.NChar, 50);
            comm.Parameters["@nameTextBox"].Value = custName.Text;
             comm.Parameters.Add("@phoneTextBox", System.Data.SqlDbType.NChar, 50);
            comm.Parameters["@phoneTextBox"].Value = custPhone.Text;
            comm.Parameters.Add("@emailTextBox", System.Data.SqlDbType.NChar, 50);
            comm.Parameters["@emailTextBox"].Value = custEmail.Text;
            comm.Parameters.Add("@cb", System.Data.SqlDbType.Bit);
            comm.Parameters["@cb"].Value = mailMe.Checked;
            comm.Parameters.Add("@msgTextBox", System.Data.SqlDbType.NChar, 200);
            comm.Parameters["@msgTextBox"].Value = custExp.Text;
         

            // Enclose database code in Try-Catch-Finally
            try
            {
                // Open the connection
                conn.Open();
                // Execute the command
                comm.ExecuteNonQuery();
                // Reload page if the query executed successfully
                Response.Redirect("SP_thankyou.html");
            }
            catch (SqlException ex)
            {
                // Display error message
                dbErrorMessage.Text =
                   "Error submitting the data!" + ex.Message.ToString();

            }
            finally
            {
                // Close the connection
                conn.Close();
            }
        }
    }

</script>

<html xmlns="http://www.w3.org/1999/xhtml">


<!DOCTYPE html>
<html lang="en">
<head runat="server">
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
        <h1>Customer Survey</h1>
         <p>Let us know where we can Improve!</p>
        <form id="survey" runat="server">
           <fieldset id="custInfo">
              <legend>Customer Information</legend>
              <div class="formRow">
                  <asp:Label ID="name" runat="server" Text="Name"></asp:Label> 
                  <asp:TextBox ID="custName" runat="server" placeholder="First and Last name"></asp:TextBox>
              </div>
  
              <div class="formRow">
                  <asp:Label ID="Phone" runat="server" Text="phone"></asp:Label> 
                  <asp:TextBox ID="custPhone" runat="server" value="(###) ###-####"></asp:TextBox>
              </div>
  
              <div class="formRow">
                  <asp:Label ID="email" runat="server" Text="Email"></asp:Label>
                  <asp:TextBox ID="custEmail" runat="server"></asp:TextBox>
              </div>
  
               <asp:CheckBox ID="mailMe" runat="server" />
              <label for ="mailMe">Add me to your mailing list for great coupons and specials</label>
  
  
  
              <label for="commBox">Tell us more about your experience!</label>
               <asp:TextBox ID="custExp" runat="server"></asp:TextBox>
           </fieldset>
           
           <div id="buttons">
           <asp:Button ID="submitButton" runat="server" Text="Submit" OnClick="submitButton_Click" />
              <input type="reset" value="Cancel" /> />
           </div>
           <!--End of Survey-->
   <asp:Label ID="dbErrorMessage" runat="server"></asp:Label>
        </form>
  
       
     </section>
      
      
      <aside>
      </aside>
      
   </article>   
 
   
   <footer>

   </footer>
   
</body>
</html>