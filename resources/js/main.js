import './formIngredient.js';
import './cookies.js';
import './fetchAPI.js';
import $ from 'jquery';

// Récupération de la variable locale de l'utilisateur indiquant l'acceptation des cookies
var cookiesAccepted = localStorage.getItem('cookiesAccepted');

// Initialisation du script Matomo pour l'enregistrement des événèments utilisateur si cookies acceptés
if (cookiesAccepted === "true")
{
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function()
    {
        var u="//localhost/matomo/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
}

// Affichage du formulaire et dissimulation de la recette par défaut
$(function()
{
    $('#formulaire').show();
    $('#recette').hide();
});

// Affichage du formulaire et dissimulation de la recette en cliquant sur le bouton flèche #return
$('#returnButton').on('click', () =>
{
    $('#formulaire').show();
    $('#recette').hide();

    // Envoi de l'évenement à Matomo si cookies acceptés
    if (cookiesAccepted == true)
    {
        _paq.push(['trackEvent', 'Button click', 'Return to form']);
    }
});