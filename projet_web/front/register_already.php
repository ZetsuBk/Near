<?php 
  require "header.php";
?> 



  <div class="body1">
    <div class="welcom">. .</div>
    <div>
        <form action="register_check.php" method="POST" id="register">
            <label for="text"  ><p>First Name </p><p id="error_firstname" style=" color : red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color: red;">invalide email or password</a><p></label> 
            <input type="text" name="first_name" id="name" placeholder="first name">

            <label forse="text" name="last_name" placeholder="last name">Last name <p id="error_lastname" style=" color : red;"><p></label>
            <input type="text" name="last_name" id="last" placeholder="last name">

            <label for="text" >Email <p id="error_email" style=" color : red;"><p></label> 
            <input type="text" name="email" id="email" placeholder="email">
            
            
            <label for="password" >Password <p id="error_password" style=" color : red;"><p></label> 
            <input type="password" name="password" id="password" placeholder="********">
             
            <label for="password" >Confirme Password  <p id="error_conpassword" style=" color : red;"><p></label> 
            <input type="password" name="confirm_password"id="conpass" placeholder="********">

            <label for="register" >You have acount? <a href="login.php">login now</a></label>
             <button type="submit" name="register">register</button>
             
        </form>
    </div>
  </div>
  
  <script src="js/register_error.js"></script>
  
  