    var  e=/[@.]/;

   let first_name="";
   document.getElementById("name").addEventListener("keyup",function(){
    first_name=document.getElementById("name").value;
    var d=/[`!@#$%^&*()+\-=\[\]{};':"\\|,.<>\/?~]/;
    
    if( d.test(first_name))
    {
        document.getElementById("error_firstname").textContent="non valide character";
    }
    else{
        document.getElementById("error_firstname").textContent="";
    }

    })


    document.getElementById("last").addEventListener("keyup",function(){
    first_name=document.getElementById("last").value;
    var d=/[`!@#$%^&*()+\-=\[\]{};':"\\|,.<>\/?~]/;
    
    if( d.test(first_name))
    {
        document.getElementById("error_lastname").textContent="non valide character";
    }
    else{
        document.getElementById("error_lastname").textContent="";
    }

    })


    document.getElementById("password").addEventListener("keyup",function(){
    first_name=document.getElementById("password").value;
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})");
    
    if( strongRegex.test(first_name))
    {
        document.getElementById("error_password").textContent="";
    }
    else{
        document.getElementById("error_password").textContent="a-z A-Z 0-9 , 8 charater";
    }

    })
    

    document.getElementById("register").addEventListener("submit",function(){
    var pass=document.getElementById("password").value;
    var conpass=document.getElementById("conpass").value;
  
    if(conpass != pass )
    {
        document.getElementById("error_conpassword").textContent="not valid";
        event.preventDefault();
    }
   else if(    document.getElementById("error_password").textContent =="a-z A-Z 0-9 , 8 charater" ||   document.getElementById("error_lastname").textContent =="non valide character" || document.getElementById("error_firstname").textContent =="non valide character" 
              || document.getElementById("name").value=="" || document.getElementById("last").value=="" || document.getElementById("conpass").value=="")
    {
        
        event.preventDefault();
    }
    else if (!e.test(document.getElementById("email").value))
    {
        document.getElementById("error_email").textContent="not valid";
        event.preventDefault();
    }
    }) 
