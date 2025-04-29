document.addEventListener("DOMContentLoaded", function() {
    let menu = document.querySelector(".nav-links");
    let burger = document.querySelector(".hamburger");

    burger.addEventListener("click", function() {
        menu.classList.toggle("show");
    });
});

document.addEventListener("scroll", function() {
    let scrollPos = window.scrollY;
    let sections = document.querySelectorAll(".section");
    let body = document.body;

    sections.forEach((section) => {
        let offset = section.offsetTop;
        let height = section.offsetHeight;

        if (scrollPos >= offset - window.innerHeight / 2 && scrollPos < offset + height) {
            section.style.opacity = 1;
            section.style.transform = `translateY(0px)`;

            let colors = {
                "surface": "rgb(1, 138, 197)",
                "shallow": "#0077BE",
                "mid-depth": "#005F73",
                "deep-sea": "#00334E",
                "abyss": "#001f3f"
            };

            let sectionClass = section.classList[1];
            if (colors[sectionClass]) {
                body.style.transition = "background-color 0.3s linear";  
                body.style.backgroundColor = colors[sectionClass];
            }
        } else {
            section.style.opacity = 0.8;
            section.style.transform = `translateY(20px)`;
        }
    });
});
