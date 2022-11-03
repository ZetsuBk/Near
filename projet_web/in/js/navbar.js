
document.getElementById("nav_bar").addEventListener("mouseover",function(){
    document.getElementById("nav_bar").style.display="flex";
});
document.getElementById("profile_img").addEventListener("mouseover",function(){
    document.getElementById("nav_bar").style.display="flex";
});

document.getElementById("nav_bar").addEventListener("mouseleave",function(){
    document.getElementById("nav_bar").style.display="none";
})

document.getElementById("profile_img").addEventListener("mouseleave",function(){
    document.getElementById("nav_bar").style.display="none";
})

document.getElementById("nav_bar").addEventListener("click",function(){
    document.getElementById("nav_bar").style.display="none";
})


