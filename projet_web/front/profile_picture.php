<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_1.css"> 
     <title>Document</title>
</head>
<body>
   <header>
   <div class="logo">Near</div>  
   <nav>
        
         <ul class="link">
            <li><a href="login.php">login&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
            <li><a href ="register.php">Register&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
         </ul>
      </nav>
   </header>


<div class="center">
<div class="welcom">. .</div>
  <form action="upload.php" method="post" enctype="multipart/form-data">
       <img id="photo" src="images/blank-profile-picture-973460.png">
       <label for="inpuTag" id="btn">
       <input type="file" accept="image/*" id="inpuTag" name="file" onchange="loadFile(event)" >
       Choose Picture</label>
       <button type="submit" name="submit">Submit</button>
  </form>
  
 
 
 
 
 <script>
  
   var loadFile = function(event) {
	var image = document.getElementById('photo');
	var name=event.target.files[0].name;
   var imageext= name.split(".");
   var extensionimg = imageext[imageext.length-1].toLowerCase();
   console.log(extensionimg);
   var extension= ["jpg","jpeg","png"];
   for(var i=0 ;i<extension.length;i++)
   {   
      
      //check for image extention
       if(extension[i]==extensionimg)
       {
            image.src= URL.createObjectURL(event.target.files[0]);
       }
       
   }
};
   </script>

