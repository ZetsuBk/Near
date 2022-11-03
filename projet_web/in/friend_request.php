<?php 
 
 session_start();

 if(isset($_POST['invite']))
 {
         
        if(isset($_POST['id']))
        {    
        	require_once "../front/database.php";

            $sql="INSERT INTO friends values(?,?,?)";
            $stmt=mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                     header("location: home.php?error=sql_error");
                     exit();
            }
            else
            {      $case="a";
                   mysqli_stmt_bind_param($stmt,"sss",$_SESSION['id'],$_POST['id'],$case);
                   mysqli_stmt_execute($stmt);
                   die("<script>history.go(-1)</script>");
 
            }
        }
        else
        {
               die("<script>history.go(-1)</script>");
        }
 }
  else if(isset($_POST['accept']))
  {
         
        if(isset($_POST['id']))
        {    
        	require_once "../front/database.php";

            $sql="UPDATE  friends set CAS = ? where ID_1=? and ID_2=?";
            $stmt=mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                     header("location: home.php?error=sql_error");
                     exit();
            }
            else
            {      $case="f";
                   mysqli_stmt_bind_param($stmt,"sss",$case,$_POST['id'],$_SESSION['id']);
                   mysqli_stmt_execute($stmt);
                   die("<script>history.go(-1)</script>");
 ;
            }
        }
        else
        {
           die("<script>history.go(-1)</script>");
        }
 }
 else
 {
                    die("<script>history.go(-1)</script>");
 }

?>