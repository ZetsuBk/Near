<?php 
  require "header.php";
?> 




  <div class="body1">
    <div class="welcom">welcome</div>
    <div>
        <form action="login_check.php" method="POST">
            <label for="email" id="email">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color: red;">invalide email or password</a></label> 
            <input type="text" name="email" placeholder="@email">
            <label for="password" id="password">Password</label> 
            <input type="password" name="password" placeholder="********">
            <label for="register" id="register">You already have acount? <a href="register.php">register now</a></label>
            <button type="submit" name="login">Login</button>
             
        </form>
    </div>
  </div>

 
