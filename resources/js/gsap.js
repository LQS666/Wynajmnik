// Controller
const controlerGSAP = new ScrollMagic.Controller();

// Animation
const heroAnimation = gsap.timeline({ defaults: { duration: 1 } });
heroAnimation.set(".welcome-header", { visibility: "visible" })
    .from(".fade-up", { y: -20, stagger: .4, opacity: 0 })
    .from(".welcome-right", { backgroundPosition: '200px 0px', opacity: 0 }, "-=1.5")
    .from(".welcome__image", { x: 100, opacity: 0 }, "-=1.5")

const heroTimeline = gsap.to(".welcome__content", { y: '-50', duration: 1 })
const advantagesTimeline = gsap.to(".before-advantages", { height: '2vh', duration: 1 })
const aboutTimeline = gsap.timeline({ defaults: { duration: 1 } });
aboutTimeline.to(".about__image-container img", { y: '-100', duration: 1 })
    .to(".about__content__title", { y: '100', duration: 1 }, "-=1")
const promoTimeline = gsap.timeline({ defaults: { duration: 1 } });
promoTimeline.to(".promo__item1__desc h4", { y: '-80', duration: 1 })
    .to(".promo__item2__desc h4", { y: '-80', duration: 1 }, "-=1")

// Scene
const heroSection = new ScrollMagic.Scene({
    triggerElement: ".welcome-header",
    duration: '100%',
    triggerHook: 0,
})
    .setTween(heroTimeline)
    .addTo(controlerGSAP);

const advantagesSection = new ScrollMagic.Scene({
    triggerElement: ".before-advantages",
    duration: '100%',
    triggerHook: 0.9,
})
    .setTween(advantagesTimeline)
    .addTo(controlerGSAP);

const aboutSection = new ScrollMagic.Scene({
    triggerElement: '.about__content',
    triggerHook: 0.7,
    duration: '100%'
})
    .setTween(aboutTimeline)
    .addTo(controlerGSAP);

const promoSection = new ScrollMagic.Scene({
    triggerElement: '.promo',
    triggerHook: 0.8,
    duration: '100%'
})
    .setTween(promoTimeline)
    .addTo(controlerGSAP);


// Clouds Animation
document.addEventListener("DOMContentLoaded", function (event) {

    function clouds() {
        const tl = gsap.timeline({ repeat: -1 });

        tl.to(".cta__clouds", 52, {
            backgroundPosition: "-2247px bottom",
            force3D: true,
            rotation: 0.01,
            z: 0.01,
            ease: Linear.easeNone
        });

        return tl;
    }

    const masterTL = new TimelineMax({
        repeat: -1
    });

    window.onload = function () {

        masterTL
            .add(clouds(), 0)
            .timeScale(0.7)
            .progress(1).progress(0)
            .play();
    };
});