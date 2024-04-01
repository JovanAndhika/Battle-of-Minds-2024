

gsap.from(".loader-1", {
    width: 0,
    duration: 2,
    ease: "power2.inOut",
});

gsap.to(".loader", {
    background: 'none',
    delay: 2.5,
    duration: 0.1,
});

gsap.to(".loader", {
    scale: 40,
    duration: 1,
    delay: 2,
    ease: "power2.inOut",
});


let delayInterval = 2.5;

for (let i = 1; i <= 9; i++) {
    gsap.to(`.layer${i}`, {
        duration: 0.3,
        opacity: 1,
        delay: delayInterval,
        scale: 1,
        ease: "power2.inOut",
    });
    delayInterval += 0.35;
}


gsap.to('.loader-1', {
    duration: 1,
    delay: 4,
    background: "radial-gradient(circle, rgba(18, 0, 55, 1) 0%, rgba(34, 0, 106, 1) 18%, rgba(56, 0, 134, 1) 62%, rgba(68, 0, 162, 1) 79%, rgba(88, 0, 212, 1) 100%)",
    ease: "power3.inOut",
});

for (let i = 1; i <= 8; i++) {
    gsap.to(`.layer${i}`, {
        opacity: 0,
        delay: 5.47, //sesuaino dewe
    });
}

gsap.to('.layer9', {
    duration: 3,
    scale: 90,
    delay: 5.6,
    ease: "power3.inOut",
});

gsap.to('.textlayer', {
    opacity: 0,
    delay: 6.2,
});


gsap.to(".loading-screen", {
    display: "none",
    delay: 6.3,
});

gsap.to(".content", {
    display: "initial",
    position: "initial",
    delay: 6.5,
});

gsap.to(".logo", {
    animation: "logoGlow 3s ease-in-out infinite, bounceInDown .75s",
    delay: 6.5,
});

gsap.to(".description", {
    animation: "bounceInUp .75s",
    opacity: 1,
    delay: 6.8,
});
