const menuBtn = document.querySelector("#fa-mobile-menu-button")
const nav = document.querySelector("#fa-navigation")

menuBtn.addEventListener("click", showNavigation)

function showNavigation() {
    if (nav.classList.contains("visible-mobile-menu")) {
        nav.classList.remove("visible-mobile-menu")
    } else {
        nav.classList.add("visible-mobile-menu")
    }
}