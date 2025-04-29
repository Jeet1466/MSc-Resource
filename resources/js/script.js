document.addEventListener("scroll", function () {
    let sections = document.querySelectorAll(".section");
    let scrollPos = window.scrollY + window.innerHeight / 2;

    sections.forEach(section => {
        if (section.offsetTop <= scrollPos && section.offsetTop + section.offsetHeight > scrollPos) {
            document.body.style.background = getComputedStyle(section).background;
        }
    });
});
