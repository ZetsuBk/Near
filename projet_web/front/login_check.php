<?php 

if(isset($_POST["login"]))
{   
    require_once "database.php";

    $emial=trim($_POST["email"]);
    $password=$_POST["password"];

    if(empty($emial) || empty($password))
    {
        header("location: login.php?error=empty_field");
        exit();
    }
    else{
      
        $sql="SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: login.php?error=sql_error");
            exit(); 
        }
        else
        {
              mysqli_stmt_bind_param($stmt,"s",$emial);
              mysqli_stmt_execute($stmt);
              $result=mysqli_stmt_get_result($stmt);
              if($row=mysqli_fetch_assoc($result))
              {
                $passcheck = password_verify($password,$row["password"]);
                if($passcheck == false)
                {
                    header("location: login_error.php?error=email_or_password");
                    $_POST["email"]="error";
                    exit();
                }
                else if($passcheck== true) 
                {
                   session_start();
                   $_SESSION["first_name"] = $row["firstname"];
                   $_SESSION["id"] = $row["id"];
                   $_SESSION["last_name"] = $row["lastname"];
                   $_SESSION["email"] = $row["email"];
                   $_SESSION['profile']=$row['profile'];
                   header("location: ../in/home.php?succes=login_".$_SESSION['first_name']."_".$_SESSION["last_name"]);
                   exit();
                }     
              }
              else
              {
                  header("location: login_error.php?error=email/_or_password");
                  $_POST["email"]="error";
                  exit();
              }
              
        }

    }
}
else{

    header("location: login.php");
    exit();
}


?>