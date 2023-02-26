import { colors } from './colors';

const theme = document.getElementById("theme");

theme.addEventListener("change", () => {
    toggleTheme();
});

colorize();

function colorize(){
    if(localStorage.getItem("pr") === colors.light.primary){
        setLight();
    }else{
        setDark();
    }
}

function changeTheme(color){
    localStorage.setItem("theme", color);

    localStorage.setItem("pr", colors[color].primary);
    localStorage.setItem("se", colors[color].secondary);
    localStorage.setItem("te", colors[color].tertiary);
    localStorage.setItem("rgbte", colors[color].rgbtertiary);
    localStorage.setItem("fo", colors[color].fourth);


    document.documentElement.style.setProperty('--pr', colors[color].primary);
    document.documentElement.style.setProperty('--se', colors[color].secondary);
    document.documentElement.style.setProperty('--te', colors[color].tertiary);
    document.documentElement.style.setProperty('--rgbte', colors[color].rgbtertiary);
    document.documentElement.style.setProperty('--fo', colors[color].fourth);
}

function toggleTheme(){
    if(localStorage.getItem("theme") === "dark"){
        changeTheme('light');
    }else{
        changeTheme('dark');
    }
}
