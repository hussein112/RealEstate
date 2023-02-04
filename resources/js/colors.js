const light = {
    primary: "#ffffff",
    secondary: "#79ffd7",
    tertiary: "rgb(60, 138, 255)",
    rgbtertiary: "60, 138, 255",
    fourth: "#292929",
}

const dark = {
    primary: "#03001C",
    secondary: "#5e6e82",
    tertiary: "rgb(91, 143, 185)",
    rgbtertiary: "255, 255, 255",
    fourth: "#ffffff",
}

window.onload = ()=>{

    if(localStorage.getItem("pr") == light.primary){
        setLight();
    }else{
        setDark();
    }
}


$(function() {
    $('#theme').change(function() {
        toggleTheme();
    })
});


function toggleTheme(){
    if(localStorage.getItem("theme") == "dark"){
        setLight();
    }else{
        setDark();
    }
}

function setDark(){
    localStorage.setItem("theme", "dark");

    localStorage.setItem("pr", dark.primary);
    localStorage.setItem("se", dark.secondary);
    localStorage.setItem("te", dark.tertiary);
    localStorage.setItem("rgbte", dark.rgbtertiary);
    localStorage.setItem("fo", dark.fourth);


    document.documentElement.style.setProperty('--pr', dark.primary);
    document.documentElement.style.setProperty('--se', dark.secondary);
    document.documentElement.style.setProperty('--te', dark.tertiary);
    document.documentElement.style.setProperty('--rgbte', dark.rgbtertiary);
    document.documentElement.style.setProperty('--fo', dark.fourth);
}

function setLight(){
    localStorage.setItem("theme", "light");

    localStorage.setItem("pr", light.primary);
    localStorage.setItem("se", light.secondary);
    localStorage.setItem("te", light.tertiary);
    localStorage.setItem("rgbte", light.rgbtertiary);
    localStorage.setItem("fo", light.fourth);

    document.documentElement.style.setProperty('--pr', light.primary);
    document.documentElement.style.setProperty('--se', light.secondary);
    document.documentElement.style.setProperty('--te', light.tertiary);
    document.documentElement.style.setProperty('--rgbte', light.rgbtertiary);
    document.documentElement.style.setProperty('--fo', light.fourth);
}
