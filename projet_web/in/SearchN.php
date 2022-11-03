<?php
require "header.php";
?>
<div id="cont">
</div>
<script>
    setInterval(() => {
    container = document.getElementById("cont");
    
    s = window.location.hash;
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            container.innerHTML = "";
            data = this.responseText;
            data = JSON.parse(data);
            for (var i = 0; i < data.length; i++) {

                themplate = "<div class='friend'><form action=\"friend_request.php\" method=\"POST\"><img src=\"../uplaod/achrofictetouani@gamil.com/profile.png\" alt=\"none\"><label>"+data[i]["firstname"]+" "+data[i]["lastname"]+"</label><input name=\""+data[i]["id"]+"\" value=\"8\" style=\"display: none;\"><label id='state'>FRIEND</label></form>                </div>";
                container.innerHTML +=themplate;
            }
        }
    };

    xhr.open('GET', '../API/GetUsersBySearch.php?s=' + s);
    xhr.send();
        
    }, 5000);
    
</script>