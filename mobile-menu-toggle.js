const toggleBars = document.getElementById("mobile-menu-toggle");
const menuMainNavContainer = document.getElementsByClassName('menu-main-nav-container')[0];
const menuContainer = document.getElementById("main-menu");

console.log(menuMainNavContainer);

function togglingClasses() {
    toggleBars.classList.toggle("toggled");
    menuMainNavContainer.classList.toggle("toggled");
    menuContainer.classList.toggle("toggled");
}

toggleBars.addEventListener('click', function(){
    if(toggleBars.classList.contains("toggled")) {
        console.log("Menu is now closed.");
        togglingClasses();
    } else {
        console.log("Menu is now open.")
        togglingClasses();
    }
});