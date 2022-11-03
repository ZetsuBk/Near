<?php 
  require "header.php";
  if(isset($_GET['search_box']))
  {       
          require_once "../front/database.php";  
          
         $arr=explode(" ",trim($_GET['search_box']));
         #mysqli real escape string
         
         if(count($arr)==1)
         {
           $name=$arr[0];
          $sql="SELECT * FROM users WHERE firstname like ? ";
          $stmt=mysqli_stmt_init($con); 
          if(!mysqli_stmt_prepare($stmt,$sql))
          {
            header("location: home.php?error=sql_error");
            exit();
          }
          else
          {
            $name=$name."%";
            mysqli_stmt_bind_param($stmt,"s",$name);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($rows=mysqli_fetch_all($result))
            {
              foreach ($rows as $key) {
                  if($key[0]==$_SESSION['id'])
                  {
                    continue;
                  }
                ?>
                <div class="friend">
                   <form action="friend_request.php" method="POST">
                     <img src="<?php echo $key['5']?>" alt="none">
                     <label><?php echo $key['1']." ".$key[2]?></label>
                     <input name="id" value="<?php echo $key['0']?>" style="display: none;">
                     <?php
                     $sql="SELECT * FROM friends where (ID_1=? or ID_1=?) AND (ID_2=? or ID_2=?)";
                     $stmt=mysqli_stmt_init($con);
                     if(!mysqli_stmt_prepare($stmt,$sql))
                     {
                           header("location: home.php?error=sql_error");
                           exit();
                     }
                     else
                     {
                              mysqli_stmt_bind_param($stmt,"ssss",$_SESSION['id'],$key[0],$_SESSION['id'],$key[0]);
                              mysqli_stmt_execute($stmt);
                              $resuult=mysqli_stmt_get_result($stmt);
                              if($ro=mysqli_fetch_assoc($resuult))
                              {  
                                   if($ro['CAS']=='a')
                                   {
                                       if($ro['ID_1'] == $_SESSION['id'])
                                       {
                                          echo "<label  id='state'>already send</label></form>";
                                       }
                                       else
                                       {
                                         echo "<button type='submit' name='accept'>Accept</button></form>";
                                       }

                                   }
                                 else
                                 {
                                  echo "<label id='state'>"."FRIEND"."</label></form>";
                                 }

                              }
                              else
                              {
                                echo "<button type='submit' name='invite'>Invite</button></form>";
                              }
                     }
              
                                           

                     ?>
                </div>
                <?php
              }
            }
            else
            {
              echo "<h1>no result</h1>";
            }
          } 
        }
  }
  else
  {
    header("location: home.php?error=empty_search");
  }
?>



 