import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


$(function() {
$('#theme').bootstrapToggle({
        on: '<iconify-icon icon="material-symbols:mode-night-rounded" flip="horizontal"></iconify-icon>',
        off: '<iconify-icon icon="material-symbols:clear-day" flip="horizontal"></iconify-icon>',
        onstyle: 'dark',
        offstyle: 'success',
    });
    if(localStorage.getItem("theme") == "light"){
        $('#theme').bootstrapToggle('off');
    }
});
