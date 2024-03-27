function load() {
    let counter = document.querySelector(".counter");
    let currentValue = 0;

    function updateCounter() {
        if (currentValue == 100) {
            return;
        }

        currentValue += Math.floor(Math.random() * 10) + 1;
        if (currentValue > 100) {
            currentValue = 100;
        }
        counter.textContent = currentValue;

        let delay = Math.floor(Math.random() * 200) + 50;
        setTimeout(updateCounter, delay);
    }
    updateCounter();
}

startLoader();

gsap.to(".counter", 0.25, {
    delay: 3.5,
    opacity: 0,
});

gsap.to("")