<?php 

if(isset($_POST['register']))
{
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password =$_POST['password'];
    
   if(empty($first_name) ||empty($last_name) ||empty($email) || empty($password))
   {
        header("location: register.php?error=mamaka");
        exit();
   }
   else{
         require_once "database.php";
         $sql= "SELECT * FROM users WHERE email= ?";
         $stmt = mysqli_stmt_init($con);
         if(!mysqli_stmt_prepare($stmt,$sql))
         {
            header("location: register.php?error=sql_error");
            exit();
         }
         else{
           mysqli_stmt_bind_param($stmt,"s",$email);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $result=mysqli_stmt_num_rows($stmt);
           if($result >0)
           {
               header("location: register_already.php?error=email_already");
               exit();
           }
            else{
             $sql="INSERT INTO users (firstname,lastname,email,password,profile) VALUES (?,?,?,?,?)";
             $stmt= mysqli_stmt_init($con);
             if(!mysqli_stmt_prepare($stmt,$sql))
             {
                header("location: register.php?error=sql_error");
                exit();
             }
             else{
                $hash_pass= password_hash($password,PASSWORD_DEFAULT);
                $non="non";
                mysqli_stmt_bind_param($stmt,"sssss",$first_name,$last_name,$email,$hash_pass,$non);
                mysqli_stmt_execute($stmt);
                session_start();
                $_SESSION['email']=$email;
                header("location: profile_picture.php?succes=register");
                exit();
             }
           }

         }
   }

}
else
{
    header("location: register.php");
    exit();
}

?>