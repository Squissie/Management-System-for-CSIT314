// const darkMode = () => {
//     const button = document.getElementById("darkModeButton");
//     const toggle = document.body;
//     const nav = document.querySelector('.nav-links');

//     button.addEventListener('click', () => {
//         toggle.classList.toggle("dark-mode");
//         console.log("flip");

//         if (button.innerHTML === "press") {
//             button.innerHTML = "DARK";
//             nav.classList.toggle('nav-links-DARK');
//         }

//         if (button.innerHTML === "DARK") {
//             button.innerHTML = "press";
//             nav.classList.toggle('.nav-links');
//         }
//     });
// }


const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        navLinks.forEach((link, index) => {
            link.style.animation ? link.style.animation = '' : link.style.animation = `navLinkFade 0.9s ease forwards ${index / 7}s`;
        });
        burger.classList.toggle('toggle');
    });
}

// darkMode();
navSlide();
