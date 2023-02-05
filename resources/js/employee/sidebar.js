// Bootstrap
const asideToggler = document.querySelector(".aside-toggler");
const aside = document.querySelector(".sidebar-wrapper");
const main = document.querySelector("main");

const mobile = window.matchMedia("(max-width: 768px)");

asideToggler.addEventListener("click", () => {
    if(mobile.matches){
        if(aside.classList.contains("collapse-horizontal")){
            aside.classList.remove("collapse-horizontal")
        }
    }else{
        if(! aside.classList.contains("collapse-horizontal")){
            aside.classList.add("collapse-horizontal")
        }
        main.classList.toggle("show-aside");
    }
});


    
