import './formIngredient.js';
import './cookies.js';
import './fetchAPI.js';
import $ from 'jquery';

$(function() {
    $('#formulaire').show();
    $('#recette').hide();
});

$('#return').on('click', () => {
    $('#formulaire').show();
    $('#recette').hide();
});