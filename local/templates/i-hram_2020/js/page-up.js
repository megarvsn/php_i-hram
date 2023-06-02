
window.addEventListener('scroll', function () {
    pageUpToggle();
});

function pageUp() {
    var btn = document.querySelector('.page-up-btn');
    if (!btn) return;

    pageUpToggle();

    btn.addEventListener("click", function (event) {
        event.preventDefault();

        window.customScrollTo(document.body, 0, 600);
        window.customScrollTo(document.documentElement, 0, 600);
    });
}

function pageUpToggle() {
    var btn = document.querySelector('.page-up-btn');
    if (!btn) return;

    if (document.body.scrollTop > window.innerHeight || document.documentElement.scrollTop > window.innerHeight) {
        btn.classList.add("page-up-btn_show");
    } else {
        btn.classList.remove("page-up-btn_show");
    }
}

window.customScrollTo = function (element, to, duration) {
    if (duration <= 0) return;

    var difference = to - element.scrollTop;
    var perTick = difference / duration * 10;

    setTimeout(function () {
        element.scrollTop = element.scrollTop + perTick;
        if (element.scrollTop === to) return;
        window.customScrollTo(element, to, duration - 10);
    }, 10);
};