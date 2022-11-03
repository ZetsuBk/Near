<?php 
 session_start();
  
  if(!isset($_SESSION['email']))
  die("<script>history.go(-2)</script>");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
     <header>
     <div id="logo">Near</div>
            <form action="search.php" method="get" id="form" >
                <input type="text"    id="search" name="search_box" placeholder=" search" required>
                <button type="submit" name="submit">sds</button>
            </form>
            <nav>
            <img id="profile_img" src="<?php echo $_SESSION['profile'] ?>">
            <ul id="nav_bar">
                <li  id="acount" style="border-radius: 10px 10px 0px 0px">acount</li>
                <li><a href="loug_out.php">loug out</a></li>
                <li style="border-radius: 0px 0px 10px 10px">delete acount</li>
            </ul></nav>
     </header>
      <div class="leftbar">
            <ul>
                <li>TASK1</li>
                <li>s</li>
                <li>s</li>
                <li>s</li>
            </ul>
         </div>
       <div class="boddy" id="container">   
        
               
         

   

     <script src="js/navbar.js"></script>
     <script src="js/searchbox.js"></script>
