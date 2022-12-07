var overlay = document.getElementById("overlay");
document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        //overlay.style.display = 'none';
        overlay.classList.add('visuallyhidden');
        overlay.addEventListener('transitionend', function (e) {
            overlay.classList.add('hidden');
        }, {
            capture: false,
            once: true,
            passive: false
        });
    }
});
