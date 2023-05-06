const theme = document.getElementById("theme");

theme.addEventListener("change", () => {
    toggleTheme();
});
import { colors } from './colors';

const light = colors.light;
const dark = colors.dark;
colorize();



function colorize(){
    if(localStorage.getItem("pr") === light.primary){
        setLight();
    }else{
        setDark();
    }
}

function toggleTheme(){
    if(localStorage.getItem("theme") == "dark"){
        setLight();
    }else{
        setDark();
    }
}

function setDark(){
    theme.removeAttribute("checked");

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
    theme.setAttribute("checked", "");
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
