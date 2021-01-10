
let oldPrise = document.querySelectorAll(".catalog__prise-old");
let newPrise = document.querySelectorAll(".catalog__prise-new");
for (let i = 0; i < oldPrise.length; i++) {
    oldPrise[i].textContent = editOldPrise;
    newPrise[i].textContent = editnewPrise;
}

let root = document.querySelector(':root');
let rootKols = getComputedStyle(root);
let kolsSlider = rootKols.getPropertyValue('--kolsSlider');

$(document).ready(function () {

    $('.review__slider').slick({
        infinite: true,
        slidesToShow: kolsSlider,
        arrows: false,
        pauseOnHover: false,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 0,
        speed: 4400,
        dots: false
    });
});

let order = document.querySelectorAll(".catalog__order");
let close = document.querySelectorAll(".close");
let orders = document.querySelectorAll(".product-button-js");

for (let i = 0; i < orders.length; i++) {
    orders[i].onclick = function () {
        order[i].style = "display: block";
    }
    close[i].onclick = function () {
        order[i].style = "display: none";
    }
}