/***
 *
 *
 * Search
 */

const minBedRooms = document.getElementById('minBedRooms');
const maxBedRooms = document.getElementById('maxbedrooms');

//input
const rangeMin = document.getElementById('rangeMin');
const rangeMax = document.getElementById('rangeMax');

function setValue(range, rangeV){
    const newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) );
    const newPosition = 10 - (newValue * 0.2);

    rangeV.innerHTML = `<span>${range.value}</span>`;
    rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
}
document.addEventListener("DOMContentLoaded", setValue(minBedRooms, rangeMin));
document.addEventListener("DOMContentLoaded", setValue(maxBedRooms, rangeMax));
minBedRooms.addEventListener('input', ()=>{setValue(minBedRooms, rangeMin)});
maxBedRooms.addEventListener('input', ()=>{setValue(maxBedRooms, rangeMax)});
