<?php 
   session_start();
   if(isset($_POST['submit']))
   {
      if(empty($_SESSION['email']))
      {
        header("location: login.php");
        exit();
      }
      else
      {
        
        require_once "database.php";

        $name = $_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $size=$_FILES['file']['size'];
        $error=$_FILES['file']['error'];
        $fileExtension = explode('.',$name);
        $fileExtension = strtolower(end($fileExtension));
            if($error === 0)
            {
                    $newfileName = "profile".".".$fileExtension;
                    mkdir('../uplaod/'.$_SESSION['email'], 0777, true);
                    $fileDestination = "../uplaod/".$_SESSION['email'].'/'.$newfileName;
                    move_uploaded_file($tmp_name,$fileDestination);
                    $sql="UPDATE users set profile=? where email= ?";
                    $stmt=mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("location: login.ph?error=sql_error");
                        exit(); 
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,'ss',$fileDestination,$_SESSION['email']);
                        mysqli_stmt_execute($stmt);
                        $_SESSION['profile']=$fileDestination;
                        header("location: ../in/home.php?uplaodedsuccesd");
                        exit(); 
                    }
                   
            
            }
            else
            {
                header("location: login.php");
                exit();
            }
        }

      

   }
   else
   {
     header("location: login.php");
     exit();
   }
?>