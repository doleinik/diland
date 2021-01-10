let root = document.querySelector(':root');
let rootKols = getComputedStyle(root);
let kolsSlider = rootKols.getPropertyValue('--kolsSlider');

$(document).ready(function () {
    $('.review__list').slick({
        infinite: true,
        slidesToShow: kolsSlider,
        autoplay: false,
    });
});

function update() {
    var Now = new Date(), Finish = new Date();
    Finish.setHours(23);
    Finish.setMinutes(59);
    Finish.setSeconds(59);
    if (Now.getHours() === 23 && Now.getMinutes() === 59 && Now.getSeconds === 59) {
        Finish.setDate(Finish.getDate() + 1);
    }

    var sec = Math.floor((Finish.getTime() - Now.getTime()) / 1000);
    var hrs = Math.floor(sec / 3600);
    sec -= hrs * 3600;
    var min = Math.floor(sec / 60);
    sec -= min * 60;
    $(".timer .hours").html(pad(hrs));
    $(".timer .minutes").html(pad(min));
    $(".timer .seconds").html(pad(sec));
    setTimeout(update, 200);
}
function pad(s) {
    s = ("00" + s).substr(-2);
    return "<span>" + s[0] + "</span><span>" + s[1] + "</span>";
}
update();