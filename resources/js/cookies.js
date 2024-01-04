document.addEventListener('DOMContentLoaded', () => {
    const acceptCookiesBtn = document.getElementById('acceptCookies');
    const refuseCookiesBtn = document.getElementById('refuseCookies');
    const cookiesBanner = document.getElementById('cookiesBanner');

    // Récupération de la variable locale de l'utilisateur indiquant l'acceptation des cookies
    var cookiesAccepted = localStorage.getItem('cookiesAccepted');
    console.log('cookiesAccepted:', cookiesAccepted); // Debugging line

    if (!cookiesAccepted) {
        cookiesBanner.style.display = "block";
    } else {
        cookiesBanner.style.display = "none";
    }

    // Cache la bannière cookies définitivement si accepté
    acceptCookiesBtn.addEventListener('click', () => {
        // Enregistrement du choix de l'utilisateur dans une variable locale
        localStorage.setItem('cookiesAccepted', true);
        cookiesBanner.style.display = "none";
    });

    // Cache la bannière cookies jusqu'au prochain chargement si refusé
    refuseCookiesBtn.addEventListener('click', () => {
        // Enregistrement du choix de l'utilisateur dans une variable locale
        localStorage.setItem('cookiesAccepted', false);
        cookiesBanner.style.display = "none";
    });
});