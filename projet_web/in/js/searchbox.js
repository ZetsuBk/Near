document.getElementById('search').addEventListener("click",function function_name(){
	     document.getElementById('search').style.backgroundImage="none";
	     document.getElementById('search').style.paddingLeft="15px";
	    console.log('dfjd');
})

document.addEventListener('click',function(evt)
{
        if(evt.target != document.getElementById('search'))
        {
                 document.getElementById('search').style.backgroundImage='url("../front/images/Search_Icon.svg.png")';
	             document.getElementById('search').style.paddingLeft="40px";
        }
});