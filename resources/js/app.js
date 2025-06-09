import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function (){
    $('search-patient').on('keyup', function(){
        let query = $(this).val();
        console.log(query);
    })
})
