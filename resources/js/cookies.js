document.addEventListener('DOMContentLoaded', () => {
    const cookiesBtns = document.querySelectorAll('.cookies-btn');
    const cookiesBanner = document.getElementById('cookiesBanner');

    cookiesBanner.style.display = "block";

    cookiesBtns.forEach(btn => {
        btn.addEventListener('click', (event) => {
            cookiesBanner.style.display = "none";
        });
    });
});
