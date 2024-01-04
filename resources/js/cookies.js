document.addEventListener('DOMContentLoaded', () => {
    const acceptCookiesBtn = document.getElementById('acceptCookies');
    const refuseCookiesBtn = document.getElementById('refuseCookies');
    const cookiesBanner = document.getElementById('cookiesBanner');

    // Check if the user has already made a choice about cookies
    const cookiesAccepted = localStorage.getItem('cookiesAccepted');
    console.log('cookiesAccepted:', cookiesAccepted); // Debugging line

    if (!cookiesAccepted) {
        cookiesBanner.style.display = "block";
    } else {
        cookiesBanner.style.display = "none";
    }

    // If the user accepts cookies
    acceptCookiesBtn.addEventListener('click', () => {
        // Store the user's choice in localStorage
        localStorage.setItem('cookiesAccepted', true);
        cookiesBanner.style.display = "none";
    });

    // If the user refuses cookies
    refuseCookiesBtn.addEventListener('click', () => {
        // Store the user's choice in localStorage
        localStorage.setItem('cookiesAccepted', false);
        cookiesBanner.style.display = "none";
    });
});