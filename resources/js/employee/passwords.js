const btn = document.getElementById("showpass");
const passInput = document.getElementById("password");
const passIcon = document.getElementById("passicon");


btn.addEventListener("click", ()=>{
    if(passInput.getAttribute("type") == "text"){
        passInput.setAttribute("type", "password");
        passIcon.setAttribute("icon", "bx:hide");
    }else{
        passInput.setAttribute("type", "text");
        passIcon.setAttribute("icon", "bx:show");
    }
});
