const $navigation = $(".navigation");
const $gallery = $(".gallery");
const $gallery2 = $(".gallery2");
const $photosCounterFirstSpan = $(".photos-counter span:nth-child(1)");

$gallery2.on("init", (event, slick) => {
    $photosCounterFirstSpan.text(`${slick.currentSlide + 1}/`);
    $(".photos-counter span:nth-child(2)").text(slick.slideCount);
});

$gallery.slick({
    rows: 0,
    slidesToShow: 2,
    arrows: false,
    draggable: false,
    useTransform: false,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 1,
                vertical: true
            }
        }
    ]
});

$gallery2.slick({
    rows: 0,
    useTransform: false,
    prevArrow: ".arrow-left",
    nextArrow: ".arrow-right",
    fade: true,
    asNavFor: $gallery
});

function handleCarouselsHeight() {
    if (window.matchMedia("(min-width: 1200px)").matches) {
        const gallery2Height = $(".gallery2").height();
        $navigation.css("height", gallery2Height);
    } else {
        $navigation.css("height", "auto");
    }
}

$(window).on("load", () => {
    handleCarouselsHeight();
    setTimeout(() => {
        $(".loader").fadeOut();
    }, 200);
});

$(window).on(
    "resize",
    _.debounce(() => {
        handleCarouselsHeight();
    }, 200)
);

$(".gallery .item").on("click", function () {
    const index = $(this).attr("data-slick-index");
    $gallery2.slick("slickGoTo", index);
});

$gallery2.on("afterChange", (event, slick, currentSlide) => {
    $photosCounterFirstSpan.text(`${slick.currentSlide + 1}/`);
});